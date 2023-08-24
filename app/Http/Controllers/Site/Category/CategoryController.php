<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index($slug)
    {
        $featured = Product::orderBy('id', 'DESC')->where('featured', 1)->limit(4)->get()->toArray();
        $lastest = Product::orderBy('id', 'DESC')->limit(8)->get()->toArray();
        $categories = Category::all();
        $products = Category::where('slug', $slug)
            ->first()
            ->product()
            ->orderBy("id", "DESC")
            ->paginate(6);
        return view('frontend.product.shop', ['featured' => $featured, 'lastest' => $lastest, 'categories' => $categories, 'products' => $products]);
    }
}
