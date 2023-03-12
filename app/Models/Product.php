<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// データベースやテーブル自体に関する設定はモデルに記述 基本的に一つのデータベーステーブルに対して一つのモデル
class Product extends Model
{
    use HasFactory;
    public function carts()
    {
        return $this->belongsToMany(
            Cart::class,
            'line_items',
        )->withPivot(['id', 'quantity']);
    }
}