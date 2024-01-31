<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logged', [UserController::class, 'products']);

Route::get('/orderadmin', [OrderController::class, 'orders']);

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware('auth');

//Pedir que el correo sea verificado
Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified']);

/*Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/admin/products', [ProductController::class, 'products']);
    Route::get('/admin/products/{id}', [ProductController::class, 'detail']);
    Route::get('/admin/new_product', [ProductController::class, 'newProduct']);
    Route::post('/admin/products', [ProductController::class, 'create'])->name('products.create');
    Route::get('/admin/edit_product/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/admin/edit_product/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/admin/delete_product/{id}', [ProductController::class, 'delete'])->name('products.delete');
});*/

Route::get('products', [ ProductController::class, 'products' ]);
Route::get('products/{id}', [ ProductController::class, 'detail' ]);
Route::get('new_product', [ ProductController::class, 'newProduct' ]);
Route::post('products', [ ProductController::class, 'create' ]) -> name('products.create');
Route::get('edit_product/{id}', [ ProductController::class, 'edit' ]) -> name('products.edit'); 
Route::put('edit_product/{id}', [ ProductController::class, 'update' ]) -> name('products.update'); 
Route::delete('delete_product/{id}', [ ProductController::class, 'delete' ]) -> name('products.delete');

Route::get('products', [ ProductController::class, 'products' ])->name('products.index');
