<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //

    public function cart()
    {
        $data['cart'] = Cart::getContent();
        $data['totalQuantity'] =  Cart::getTotalQuantity();
        $data['totalPrice'] = Cart::getSubTotal();
        session()->put('totalQuantity', $data['totalQuantity']);
        return view('frontend.cart.cart', $data);
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id)->toArray();
        Cart::add([
            'id' => $product['id'], // inique row ID
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $request->qty ? $request->qty : 1,
            'attributes' => ['code' => $product['code'], 'image' => $product['image']]
        ]);
        return redirect('/gio-hang');
    }

    public function update($id, $qty)
    {
        Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $qty
            ],
        ]);
        session(['totalQuantity' => Cart::getTotalQuantity()]);
        return Cart::getSubTotal();
    }

    public function delete($id)
    {
        Cart::remove($id);
        return 'success';
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
