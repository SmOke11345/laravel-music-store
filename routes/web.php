<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/catalog');
});

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/{id}', [CatalogController::class, 'show'])->name('catalog');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [OrderController::class, 'index'])->name('cart');
    Route::post('/add-to-cart', [OrderController::class, 'store'])->name('add-to-cart');
    Route::get('/delete-from-cart/{id}', [OrderController::class, 'destroy'])->name('delete-from-cart');
    Route::post('/remove-to-cart', [OrderController::class, 'decrementItem'])->name('remove-to-cart');
});

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::post('/catalog-add-item', [CatalogController::class, 'store'])->name('catalog-add-item');
});

Auth::routes();
