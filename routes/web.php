<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, "test"]);

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function () {
    return view('login');
});

Route::group(["prefix" => "/admin"], function () {
    Route::get("/", [AdminController::class, "index"]);
    Route::get("/logout", function () {
        return view('logout');
    });
    Route::group(["prefix" => "/product"], function () {
        Route::get("/", [ProductController::class, "index"]);
        Route::get("/create", [ProductController::class, "create"]);
        Route::post("/post", [ProductController::class, "store"]);
        Route::get("/edit", [ProductController::class, "edit"]);
        Route::post("/update", [ProductController::class, "update"]);
        Route::get("/delete", function () {
            return view('delete');
        });
    });

    Route::group(["prefix" => "/user"], function () {
        Route::get("/", [UserController::class, "index"]);
        Route::get("/create", [UserController::class, "create"]);
        Route::post("/post", [UserController::class, "store"]);
        Route::get("/edit", [UserController::class, "edit"]);
        Route::post("/update", [UserController::class, "update"]);
        Route::get("/delete", function () {
            return view('delete');
        });
    });

    Route::group(["prefix" => "/category"], function () {
        Route::get("/", [CategoryController::class, "index"]);
        Route::get("/create", [CategoryController::class, "create"]);
        Route::post("/post", [CategoryController::class, "store"]);
        Route::get("/edit", [CategoryController::class, "edit"]);
        Route::post("/update", [CategoryController::class, "update"]);
        Route::get("/delete", function () {
            return view('delete');
        });
    });
});
