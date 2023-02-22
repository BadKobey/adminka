<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;

class OrderController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $sessionId = Session::getId();
        \Cart::session($sessionId);
        $cart= \Cart::getContent();
        $sum = \Cart::getTotal('price');

        $order = new Order();

        $order->user_id = $user->id;
        $order->cart_data = $order->setCartDataAttribute($cart);
        $order->total_sum = $sum;
        $order->address =  $request->address . ' ' .  $request->index;
        $order->phone = $request->phone;
        $order->save();
        return back();
    }
}
