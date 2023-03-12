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

// Route::get('/', function () {
//     return view('welcome');
// });

// routeの役割・・・URLによって該当するコントローラを呼び出す
// ProductControllerっを呼び出す
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LineItemController;
use App\Http\Controllers\CartController;

// 完全修飾名・・・グローバル空間の完全なクラス名のこと。※グローバル空間とは名前空間の外のこと。
// https://www.php.net/manual/ja/language.namespaces.rationale.php
// 第二引数・・・[コントローラークラスの完全修飾名, アクションメソッド名]
// http://xxxxxxx というURLにアクセスされたらProductControllerのindexクラスを呼び出す。nameでこのルートに'product.index'という名前を定義
// Route::get('/', [ProductController::class, 'index'])->name('product.index');

// コントローラでまとめる（グループ化）・・・引数にコントローラーを指定
Route::controller(ProductController::class)->group(function () {
  // nameメソッドはグループ内の各ルート名の前に特定の文字列を付与
  Route::name('product.')->group(function () {
    Route::get('/', 'index')->name('index');
    //URLからパラメーターを取り出して、コントローラーに渡す /{id} showメソッドの引数に渡される
    Route::get('/product/{id}', 'show')->name('show'); //product.show
  });
});

Route::controller(LineItemController::class)->group(function () {
  Route::name('line_item.')->group(function () {
    Route::post('/line_item/create', 'create')->name('create');
    Route::post('/line_item/delete', 'delete')->name('delete');
  });
});

Route::controller(CartController::class)->group(function () {
  Route::name('cart.')->group(function () {
    Route::get('/cart', 'index')->name('index');
    Route::get('/cart/checkout', 'checkout')->name('checkout');
    Route::get('/cart/success', 'success')->name('success');
  });
});