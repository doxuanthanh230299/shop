<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Order\OrderController;
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
Route::post('/test', [TestController::class, "test1"]);

Route::get('/login', [AuthController::class, "getLogin"])->middleware("checklogin");
Route::post('/login', [AuthController::class, "postLogin"])->middleware("checklogin");

Route::group(["prefix" => "/admin", "middleware" => "checkadmin"], function () {
    Route::get("/", [AdminController::class, "index"]);
    Route::get("/logout", [AdminController::class, "logout"]);

    Route::group(["prefix" => "/product"], function () {
        Route::get("/", [ProductController::class, "index"]);
        Route::get("/create", [ProductController::class, "create"]);

        Route::post("/store", [ProductController::class, "store"]);
        Route::get("/edit/{id}", [ProductController::class, "edit"]);
        Route::post("/update/{id}", [ProductController::class, "update"]);
        Route::get("/delete/{id}", [ProductController::class, "delete"]);
    });

    Route::group(["prefix" => "/user"], function () {
        Route::get("/", [UserController::class, "index"]);
        Route::get("/create", [UserController::class, "create"]);
        Route::post("/store", [UserController::class, "store"]);
        Route::get("/edit/{id}", [UserController::class, "edit"]);
        Route::post("/update/{id}", [UserController::class, "update"]);
        Route::get("/delete/{id}", [UserController::class, 'delete']);
    });

    Route::group(["prefix" => "/category"], function () {
        Route::get("/", [CategoryController::class, "index"]);
        Route::get("/create", [CategoryController::class, "create"]);
        Route::post("/store", [CategoryController::class, "store"]);
        Route::get("/edit/{id}", [CategoryController::class, "edit"]);
        Route::post("/update/{id}", [CategoryController::class, "update"]);
        Route::get("/delete/{id}", [CategoryController::class, "delete"]);
    });

    Route::group(["prefix" => "/order"], function () {
        Route::get("/", [OrderController::class, "index"]);
        Route::get("/delete", function () {
            return view('delete');
        });
    });
});
