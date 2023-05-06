<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [\App\Http\Controllers\ProductsController::class, "main"])->name("main");
Route::get("/catalog", [\App\Http\Controllers\ProductsController::class, "catalog"])->name("catalog");
Route::get("/catalog/{category}", [\App\Http\Controllers\ProductsController::class, "category"])->name("category");

Route::group(["middleware" => "unauthorized"], function() {
    Route::match(["get", "post"], "login", [\App\Http\Controllers\UsersController::class, "login"])->name("login");
    Route::match(["get", "post"], "register", [\App\Http\Controllers\UsersController::class, "register"])->name("register");
});

Route::group(["middleware" => "authorized"], function() {
    Route::get("logout", [\App\Http\Controllers\UsersController::class, "logout"])->name("logout");

    Route::group(["middleware" => "admin"], function () {
        Route::match(["get", "post"], "parts/create", [\App\Http\Controllers\ProductsController::class, "createPart"])->name("create-part");
    });
});
