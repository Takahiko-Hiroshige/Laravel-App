<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//Sessionファザードの宣言
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class CartSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Before
        if (!Session::has('cart')) {
            //インスタンスの作成 → 値の代入 → データの保存(tebleに保存)
            $cart = Cart::create();
            //セッションにカートIDを保存
            Session::put('cart', $cart->id);
        }
        return $next($request);
        // After
    }
}