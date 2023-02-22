<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $sessionId = Session::getId();
        \Cart::session($sessionId);
        $cart= \Cart::getContent();
        $sum = \Cart::getTotal('price');
        return view('main.checkout', [
            'cart' => $cart,
            'sum' => $sum,
            'user' => $user
        ]);
    }
}
