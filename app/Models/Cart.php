<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function products()
    {
        // belongsToMany・・・多対多のリレーション定義
        // 第２引数・・・関係するモデルクラス、第２引数・・・中間テーブル名
        //※Eloquentではitem_cartのように、2つの関連するモデル名をアルファベット順に結合したものを中間テーブル名とするのがデフォルト　今回は異なるため記述
        return $this->belongsToMany(
            Product::class,
            'line_items',
        )->withPivot(['id', 'quantity']); //line_itemsのカラムを取得
    }
}

// 中間テーブルの情報にアクセスするためには、以下のようにpivotプロパティを使用
// 他のカラムも取得したい場合、withPivotメソッドの引数に配列で指定
// $cart = App\Cart::find(1);

// foreach ($cart->products as $product) {
//     echo $product->pivot->cart_id;
// }