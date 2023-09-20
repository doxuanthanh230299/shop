<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
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
        $data['cart'] = Cart::getContent();
        $data['totalQuantity'] =  Cart::getTotalQuantity();
        $data['totalPrice'] = Cart::getSubTotal();
        session()->put('totalQuantity', $data['totalQuantity']);
        return view('frontend.cart.checkout', $data);
    }

    public function payment(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->state = 0;
        $order->total = Cart::getSubTotal();
        $order->save();
        foreach (Cart::getContent() as $product) {
            $orderProduct = new OrderProduct();
            $orderProduct->name = $product->name;
            $orderProduct->price = $product->price;
            $orderProduct->quantity = $product->quantity;
            $orderProduct->code = $product->attributes->code;
            $orderProduct->image = $product->attributes->image;
            $orderProduct->order_id = $order->id;
            $orderProduct->save();
        };
        return redirect('/gio-hang/hoan-thanh/' . $order->id);
    }

    public function complete($id)
    {
        $data['info'] = Order::find($id);  
        $data['cart'] = OrderProduct::where('order_id', $id)->get(); 
        if ($data['info']!=null) {
            Cart::clear();
            return view('frontend.cart.complete', $data);
        } else {
            return abort(404);
        }
    }
}
