<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_items', function (Blueprint $table) {
            $table->id();
            //unsignedBigInteger・・・unsined属性を持つBIGINT型のカラムを作成するを指定
            //bigIncrements・・・BIGINTというデータ型にオートインクリメントの設定を付け加えたカラムを作成するデータ型
            //unsined・・・符号なしの0と正の数しか登録できない属性（アンサインド）
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamps();

            // 外部キー制約
            $table->foreign('cart_id') // 外部キー
                ->references('id') // 外部キーに対応する親テーブルの主キー
                ->on('carts'); // 親テーブル名
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line_items');
    }
};