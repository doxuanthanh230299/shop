<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
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
    public function edit(Request $request)
    {
        $id = $request->id;
        $categories = Category::all();
        $category = Category::find($id);
        return view('backend.categories.editcategory', ['categories' => $categories, 'category' => $category]);
    }
    public function update(EditCategoryRequest $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent = $request->parent;
        $category->slug = Slug::getSlug($request->name);
        $category->save();

        $request->session()->flash('alert', 'Đã sửa danh mục thành công!');
        return redirect('admin/category');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category');
    }
}
