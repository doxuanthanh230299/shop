<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy("id", "DESC")->paginate(5);
        return view('backend.products.listproduct', ["products" => $products]);
    }

    public function create()
    {
        $categories = Category::all()->all();
        return view('backend.products.addproduct', ['categories' => $categories]);
    }

    public function store(AddProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $slug = Slug::getSlug($request->name);

            $file = $request->image;
            $file_extension = $file->getClientOriginalExtension();
            $file_name = $slug . $request->code . '.' . $file_extension;
            $file->move('uploads', $file_name);

            $product = new Product();
            $product->name = $request->name;
            $product->code = $request->code;
            $product->price = $request->price;
            $product->info = $request->info;
            $product->describer = $request->describer;
            $product->featured = $request->featured;
            $product->state = $request->state;
            $product->categories_id = $request->categories_id;
            $product->image = $file_name;
            $product->slug = $slug;
            $product->save();

            $request->session()->flash('alert', 'Đã thêm thành công');
            return redirect('/admin/product');
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id)->toArray();
        $categories = Category::all();
        return view('backend.products.editproduct', ['product' => $product, 'categories' => $categories]);
    }

    public function update(EditProductRequest $request)
    {
        $id = $request->id;
        $slug = Slug::getSlug($request->name);
        $product = Product::find($id);

        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->info = $request->info;
        $product->describer = $request->describer;
        $product->featured = $request->featured;
        $product->state = $request->state;
        $product->categories_id = $request->categories_id;
        $product->slug = $slug;

        if ($request->hasFile('image')) {
            $slug = Slug::getSlug($request->name);

            $file = $request->image;
            $file_extension = $file->getClientOriginalExtension();
            $file_name = $slug . $request->code . '.' . $file_extension;
            $file->move('uploads', $file_name);
            $product->image = $file_name;
        }

        $product->save();

        $request->session()->flash('alert', 'Đã sửa thành công');
        return redirect('/admin/product');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();

        $request->session()->flash('alert', 'Đã xóa thành công');
        return redirect('/admin/product');
    }
}
