<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductControler extends Controller
{
    //
    public function shop()
    {
        $products = Product::orderBy("id", "DESC")->paginate(9);
        $categories = Category::all();
        return view('frontend.product.shop', ['products' => $products,'categories'=>$categories]);
    }

    public function details(Request $request)
    {
        $slug = $request->slug;
        $product = Product::where('slug', $slug)->get()->toArray();
        $lastest = Product::where('slug', '<>', $slug)->orderBy('id', 'DESC')->limit(4)->get()->toArray();
        return view('frontend/product/detail', ['product' => $product[0]], ['lastest' => $lastest]);
    }

    public function filter(Request $request)
    {
        $minPrice = $request->start;
        $maxPrice = $request->end;
        $products = Product::whereBetween('price',  [$minPrice, $maxPrice])->orderBy('id', 'DESC')->paginate(6);
        $products->appends(['start' => $minPrice, 'end' => $maxPrice]);
        $categories = Category::all();
        return view('frontend/product/shop', ['products' => $products,'categories'=>$categories]);
    }
}
