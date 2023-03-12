<!-- 親 -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <!-- yield（イールド）で子で定義したセクションを読み込む -->
  <!--config関数：第一引数:config/app.phpのnameを指定, 第二引数:第一引数で指定したものが存在しない場合の代入値  -->
  <title>@yield('title') | {{ config('app.name', 'Laravel')}}</title>
  @vite('resources/sass/app.scss')
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