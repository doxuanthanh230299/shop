<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy("id","DESC")->paginate(5);
        return view('backend.products.listproduct', ["products" => $products]);
    }
    public function create()
    {
        return view('backend.products.addproduct');
    }
    public function store()
    {
        return view('backend.products.addproduct');
    }
    public function edit()
    {
        return view('backend.products.editproduct');
    }
    public function update()
    {
        return view('backend.products.editproduct');
    }
}
