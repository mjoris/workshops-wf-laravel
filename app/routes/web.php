<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductControllerWithAuth;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// The single route you get on a fresh install
/*
Route::get('/', function () {
    return view('welcome');
});
*/

// When at '/', redirect to the (static) course slides
Route::get('/', function (): RedirectResponse {
    return redirect('/slides');
});

// Route for demos on types in 03.lets.mvc
Route::get('/types-demo', function (Request $request): void {
    if ($request->has('qb-1')) {
        $users = DB::table('users')->get();
        dump($users);
    }
    if ($request->has('qb-2')) {
        $select = DB::table('users')->select('name', 'email as user_email')->where('status', '<>', 1);
        dump($select);
    }
    if ($request->has('elo-1')) {
        $products = Product::all();
        dump($products);
    }
    if ($request->has('elo-2')) {
        $product = Product::find(1);
        dump($product);
    }
});

// Routes for concluding demo 'webshop' of 03.lets.mvc
Route::get('/eloquent-demo-1', [ProductController::class, 'demo1']);
Route::get('/eloquent-demo-2', [ProductController::class, 'demo2']);
Route::get('/eloquent-demo-3', [ProductController::class, 'demo3']);
Route::get('/eloquent-demo-4', [ProductController::class, 'demo4']);
Route::get('/eloquent-demo-5', [ProductController::class, 'demo5']);

// Routes for concluding demo 'webshop' of 04.forms

//Route::get('/products', [ProductController::class, 'overview'])->name('products.overview');
//Route::get('/products/{product}', [ProductController::class, 'show'])->whereNumber('product')->name('products.show');
//
//Route::get('/products/create', [ProductController::class, 'showCreateForm'])->name('products.create');
//Route::post('/products/create', [ProductController::class, 'create'])->name('products.store');

// Routes for concluding demo 'webshop' of 08.auth

Route::get('/products', [ProductControllerWithAuth::class, 'overview'])->name('products.overview');
Route::get('/products/{product}', [ProductControllerWithAuth::class, 'show'])->whereNumber('product')->name('products.show');

Route::get('/products/create', [ProductControllerWithAuth::class, 'showCreateForm'])->middleware(['auth'])->name('products.create');
Route::post('/products/create', [ProductControllerWithAuth::class, 'create'])->middleware(['auth'])->name('products.store');

Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
