<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        return view('backend.orders.order', ['orders' => $orders]);
    }

    public function detail($id)
    {
        $data['order']  = Order::find($id);
        if ($data['order'] != null) {
            $data['orderProduct'] = OrderProduct::where('order_id', $id)->get();
            return view('backend.orders.detailorder', $data);
        } else {
            return abort(404);
        }
    }

    public function update($id)
    {
        $order = Order::find($id);
        $order->state = 1;
        $order->save();
        return redirect('/admin/order');
    }
}
