<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;
use Slug;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all()->all();
        return view('backend.categories.listcategory', ['categories' => $categories]);
    }
    public function store(AddCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->parent = $request->parent;
        $category->slug = Slug::getSlug($request->name);
        $category->save();
        $request->session()->flash('alert', 'Đã thêm danh mục thành công!');
        return redirect('admin/category');
    }
    public function edit()
    {
        return view('backend.categories.editcategory');
    }
    public function update()
    {
        return view('backend.categories.editcategory');
    }
}
