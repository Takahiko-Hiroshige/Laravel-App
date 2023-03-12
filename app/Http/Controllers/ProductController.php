<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // 商品一覧ページ
    // indexメソッド
    public function index()
    {
        // viewメソッドでBlade（ブレイド） というテンプレートエンジンを利用
        // product.indexでresources/views/product/index.blade.phpが表示される
        // withでBladeテンプレートに値をわたすことが可能
        // Eloquentのgetメソッドを用いてproductsテーブルの全データ取得 whereメソッド等条件を記載していないため全件取得される
        return view('product.index')
            ->with('products', Product::get());
    }

    // 商品詳細ページ
    public function show($id)
    {
        // Eloquentのfindメソッド・・・IDに紐付くレコードを取得することができる。
        return view('product.show')
            ->with('product', Product::find($id));
    }
}