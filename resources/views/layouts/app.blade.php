<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- トークンをmetaに保存 --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- yield（イールド）で子で定義したセクションを読み込む -->
        <!--config関数：第一引数:config/app.phpのnameを指定, 第二引数:第一引数で指定したものが存在しない場合の代入値  -->
        <title>@yield('title') | {{ config('app.name', 'Laravel')}}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js'])

    </head>
      <body>
        <nav class="navbar navbar-light bg-light">
          <div class="container">
            <!-- routeヘルパーは名前付きルートへのURLを生成(web.phpで実装しているroute名) -->
            <a class="navbar-brand" href="{{ route('product.index') }}">{{ config('app.name', 'Laravel')}}</a>
            <a class="fas fa-shopping-cart" href="{{ route('cart.index') }}"></a>
          </div>
        </nav>
        <!-- 子で定義したcontentセクションを読み込む -->
        @yield('content')
    </body>
</html>
