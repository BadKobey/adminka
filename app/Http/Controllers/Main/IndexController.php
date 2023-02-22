<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::query()->paginate(10);
        $sessionId = Session::getId();
        \Cart::session($sessionId);
        $cart= \Cart::getContent();
        $sum = \Cart::getTotal('price');
        return view('main.index', [
            'products' => $products,
            'cart' => $cart,
            'sum' => $sum
        ]);
    }
    public function addCart(Request $request){
        $product = Product::query()->where(['id' => $request -> id])->first();
       $sessionId = Session::getId();
        \Cart::session($sessionId)->add([
            'id' => $product->id,
            'brand' => $product->brand,
            'article' => $product->article,
            'nomenclature' => $product->nomenclature,
            'stock' => $product->stock,
            'count' => $product->count,
            'price' => $product->price,
            'quantity' => $request->qty ?? 1,
            'attributes' => [
                'img' => $product->img,
            ],
        ]);
        $cart= \Cart::getContent();
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $s = $request->s;
        $products = Product::where('nomenclature', 'LIKE', "%{$s}%")->orderBy('nomenclature')->paginate(10);
        $sessionId = Session::getId();
        \Cart::session($sessionId);
        $cart= \Cart::getContent();
        $sum = \Cart::getTotal('price');
        return view('main.index', compact('products'),[
            'cart' => $cart,
            'sum' => $sum
            ]);
    }
}
