<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// CartとProducの中間テーブル
class LineItem extends Model
{
    use HasFactory;
    //ホワイトリスト、ブラックリストはそれぞれ$fillable、$guardedという変数をモデルに記述し、配列でカラム名を記述して許可、禁止するカラムを指定
    protected $fillable = ['cart_id', 'product_id', 'quantity'];
}