<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all()->all();
        return view('backend.categories.listcategory', ['categories' => $categories]);
    }
    public function create()
    {
        return view('backend.categories.addcategory');
    }
    public function store()
    {
        return view('backend.categories.addcategory');
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
