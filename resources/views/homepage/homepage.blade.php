@extends('homepage.index')
@section('header')
    <title>WeShop - Menjual Berbagai Macam Barang Elektronik</title>
@endsection
@section('slide')
    @include('homepage.layout.slider')
@endsection
@section('content')
<div id="content">
    <div class="container">
      <div class="row bar">
        <div class="col-md-12">
          <p class="text-muted lead text-center">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>
          <div class="products-big">
            <div class="row products">
            @foreach ($products as $product)
              <div class="col-lg-3 col-md-4">
                <div class="product">
                  <div class="image">
                    <a href="{{ url('product/detail/'.$product->slug) }}">
                      <img src="{{ url($product->photo) }}" alt="" class="img-fluid image1">
                    </a>
                  </div>
                  <div class="text">
                    <h3 class="h5">
                      <a href="{{ url('product/detail/'.$product->slug) }}">{{ $product->name }}</a>
                    </h3>
                    <p class="price">Rp. {{ number_format($product->price) }}</p>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
          <div class="pages">
            <p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('footer')
    
@endsection