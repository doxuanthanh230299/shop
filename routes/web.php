<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\Category\CategoryController as SiteCategoryController;
use App\Http\Controllers\Site\Product\ProductControler as SiteProductController;
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


Route::get('/test', [TestController::class, "test"]);
Route::post('/test', [TestController::class, "test1"]);

// Admin
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
        Route::get("/{id}", [OrderController::class, "detail"]);
        Route::get("/update/{id}", [OrderController::class, "update"]);
        Route::get("/delete", function () {
            return view('delete');
        });
    });
});

// Site
Route::get('/', [SiteController::class, 'index']);
Route::get('/ve-chung-toi', [SiteController::class, 'about']);
Route::get('/lien-he', [SiteController::class, 'contact']);
Route::get('/danh-muc/{slug}.html', [SiteCategoryController::class, 'index']);

Route::group(['prefix' => '/san-pham'], function () {
    Route::get('/', [SiteProductController::class, 'shop']);
    Route::get('/{slug}.html ', [SiteProductController::class, 'details']);
    Route::get('/tim-kiem', [SiteProductController::class, 'filter']);
});

Route::group(['prefix' => '/gio-hang'], function () {
    Route::get('/', [CartController::class, 'cart']);
    Route::get('/them-hang/{id}', [CartController::class, 'addToCart']);
    Route::get('/cap-nhat-gio-hang/{id}/{qty}', [CartController::class, 'update']);
    Route::get('/xoa-hang/{id}', [CartController::class, 'delete']);
    Route::get('/thanh-toan.html', [CartController::class, 'checkout']);
    Route::post('/thanh-toan', [CartController::class, 'payment']);
    Route::get('/hoan-thanh/{id}', [CartController::class, 'complete']);
});
