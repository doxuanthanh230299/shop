<?php

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

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function () {
    return view('login');
});

Route::group(["prefix" => "/admin"], function () {
    Route::get("/", function () {
        return view('admin');
    });
    Route::get("/logout", function () {
        return view('logout');
    });
    Route::group(["prefix" => "/product"], function () {
        Route::get("/", function () {
            return view('index');
        });
        Route::get("/create", function () {
            return view('create');
        });
        Route::post("/post", function () {
            return view('store');
        });
        Route::get("/edit", function () {
            return view('edit');
        });
        Route::post("/update", function () {
            return view('update');
        });
        Route::get("/delete", function () {
            return view('delete');
        });
    });
});
