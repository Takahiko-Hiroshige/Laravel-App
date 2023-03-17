<?php
// routeの役割・・・URLによって該当するコントローラを呼び出す
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LineItemController;
use App\Http\Controllers\CartController;
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
// 完全修飾名・・・グローバル空間の完全なクラス名のこと。※グローバル空間とは名前空間の外のこと。
// https://www.php.net/manual/ja/language.namespaces.rationale.php

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('auth');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::name('profile.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy');
    });

    /**商品 */
    Route::controller(ProductController::class)->group(function () {
        Route::name('product.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/product/{id}', 'show')->name('show');
        });
    });

    /**商品とカート */
    Route::controller(LineItemController::class)->group(function () {
        Route::name('line_item.')->group(function () {
            Route::post('/line_item/create', 'create')->name('create');
            Route::post('/line_item/delete', 'delete')->name('delete');
        });
    });

    /**カート */
    Route::controller(CartController::class)->group(function () {
        Route::name('cart.')->group(function () {
            Route::get('/cart', 'index')->name('index');
            Route::get('/cart/checkout', 'checkout')->name('checkout');
            Route::get('/cart/success', 'success')->name('success');
        });
    });
});
// require __DIR__ . '/auth.php';