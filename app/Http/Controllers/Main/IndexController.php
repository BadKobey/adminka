<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::paginate(10);
        return view('main.index', [
            'products' => $products,
        ]);
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $products = Product::where('nomenclature', 'LIKE', "%{$s}%")->orderBy('nomenclature')->paginate(10);
        return view('main.index', compact('products'));
    }
}
