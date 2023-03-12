<!-- layoutsディレクトリのapp.blade.phpファイルを読み込む -->
@extends('layouts.app')

<!-- sectionで読み込んだlayout（親）にtitleを渡す -->
@section('title')
商品一覧
@endsection

<!-- sectionで読み込んだlayout（親）にcontentを渡す -->
@section('content')

<div class="jumbotron top-img">
  <p class="text-center text-white top-img-text">{{ config('app.name', 'Laravel')}}</p>
</div>

<div class="container">
  <div class="top__title text-center">
    All Products
  </div>
  <div class="row">
    <!-- ディレクティブ・・・構文のような役割を果たすもの。テンプレートに簡単に組み込むことができる。@で始まるもの https://qiita.com/nyax/items/7f949bcb331b7221e593 -->
    <!-- ディレクティブを設定 ※Bladeテンプレートにおける制御構文-->
    @foreach ($products as $product)
    <a href="{{ route('product.show', $product->id) }}" class="col-lg-4 col-md-6">
      <div class="card">
        <!-- asset関数：publicディレクトリのパスを返す関数 -->
        <img src="{{ asset($product->image) }}" class="card-img" />
        <div class="card-body">
          <p class="card-title">{{ $product->name }}</p>
          <!-- number_format() 1000 → 1,000 -->
          <p class="card-text">¥{{ number_format($product->price) }}</p>
        </div>
      </div>
    </a>
    @endforeach
  </div>
</div>

</html>

@endsection
