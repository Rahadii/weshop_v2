@extends('homepage.index')
@section('header')
    <title>WeShop - Menjual Berbagai Macam Barang Elektronik</title>

    <style>
        span.persen {
            font-weight: bold;
        }
    </style>
@endsection
@section('navbar')
<header class="nav-holder make-sticky">
    <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
      <div class="container">
        <a href="index.html" class="navbar-brand home">
            <img src="{{ url('homepage/img/weshop.png') }}" alt="Universal logo" class="d-none d-md-inline-block">
            <img src="{{ url('homapage/img/logo-small.png') }}" alt="Universal logo" class="d-inline-block d-md-none">
            <span class="sr-only">Universal - go to homepage</span>
        </a>
        <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
        <div id="navigation" class="navbar-collapse collapse">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
            <a href="{{ route('homepage.index') }}">Home</a>
            <li class="nav-item dropdown menu-large active">
              <a href="{{ url('product') }}">Product</a>
            </li>

            <!-- ========== FULL WIDTH MEGAMENU ==================-->
            <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle">Category <b class="caret"></b></a>
            <ul class="dropdown-menu megamenu">
              <li>
                <div class="row">
                  @foreach($category as $cat)
                  <div class="col-md-6 col-lg-3">
                    <h5><a href="{{ url('/category/'.$cat->slug) }}">{{ $cat->name }}</a></h5>
                    <ul class="list-unstyled mb-3">
                      @foreach($cat ->children as $sub)
                      <li class="nav-item">
                        <a href="{{ url('/category/'.$sub->slug) }}" class="nav-link">{{ $sub->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  @endforeach
              </li>
            </ul>
            </li>
            <li class="nav-item dropdown menu-large">
              {{-- {{ url('penjual') }} --}}
              <a href="#" data-hover="dropdown" data-delay="200">Supplier </a>
            </li>
            {{-- @if(Auth::user()) --}}
           <li class="nav-item dropdown"><a style="color: #3aa18c" href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">
            {{-- {{ url(Auth::user()->photo) }} --}}

            {{-- {{ url(Auth::user()->photo) }} --}}
            <img class=" rounded-circle" width="15px" src="#">
            {{-- {{(Auth::user()->name) }} --}}
            <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-item">
                  {{-- {{ url('myprofil')}} --}}
                  <a href="#" class="nav-link">My Account</a></li>
                <li class="dropdown-item">
                  {{-- {{ url('cart/myorder') }} --}}
                  <a href="#" class="nav-link">My Order</a></li>
                {{-- @if(Auth::user()->role == "supplier") --}}
                <li class="dropdown-item">
                  {{-- {{ url('myproduct') }} --}}
                  <a href="#" class="nav-link">My Product</a>
                </li>
                {{-- @endif --}}
                {{-- {{ url('logout') }} --}}
                <li class="dropdown-item"><a href="#" class="nav-link">Logout</a></li>
              </ul>
            </li>
            {{-- @endif --}}
            <!-- ========== FULL WIDTH MEGAMENU END ==================-->
          </ul>
        </div>
        <div id="search" class="collapse clearfix">
          <form role="search" class="navbar-form">
            <div class="input-group">
              <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>
@endsection
@section('slide')

@endsection
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
      <div class="row d-flex align-items-center flex-wrap">
        <div class="col-md-7">
          <h1 class="h2">All Product by Supplier</h1>
        </div>
        <div class="col-md-5">
          <ul class="breadcrumb d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">{{ $user->username }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<div id="content">
  <br>
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr><th width="200px">Username</th><td>{{ $user->username }}</td></tr>
                <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                <tr><th>Address</th><td>{{ $user->address }}</td></tr>
                <tr><th>Photo</th><td><img src="{{ url($user->photos) }}" width="70px"/></td></tr>
                <tr><th>Tanggal Bergabung</th><td>{{ date('d/m/y',strtotime($user->created_at)) }}</td></tr>
            </table>
        </div>
    </div>
</div>
    <div class="container">
      <div class="row bar">
        <div class="col-md-12">
          <p class="text-muted lead text-center">Jual Komputer dan Gedget terlengkap.</p>
          <div class="products-big">
            <div class="row products">
              @foreach($products as $product)
              <div class="col-lg-3 col-md-4">
                <div class="product">
                  <div class="image">
                    <a href="{{ url('product/detail/'.$product->slug) }}"><img src="{{ url($product->photo) }}" alt="" class="img-fluid image1"></a></div>
                  <div class="text">
                    <h3 class="h5"><a href="{{ url('product/detail/'.$product->slug) }}">
                      {{ $product->name }}
                    </a></h3>
                    <p class="price">Rp. {{ number_format($product->price) }}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('footer')
    
@endsection