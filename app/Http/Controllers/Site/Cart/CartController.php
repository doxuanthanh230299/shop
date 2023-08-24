<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function cart()
    {
        return view('frontend.cart.cart');
    }

    public function addToCart()
    {
        return view('frontend.cart.cart');
    }

    public function update()
    {
        return view('frontend.cart.cart');
    }

    public function delete()
    {
        return view('frontend.cart.cart');
    }

    public function checkout()
    {
        return view('frontend.cart.cart');
    }

    public function payment()
    {
        return view('frontend.cart.cart');
    }
    
    public function complete()
    {
        return view('frontend.cart.cart');
    }
}
