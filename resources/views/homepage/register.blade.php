@extends('homepage.index')
@section('header')
    <title>Register or Login - WeShop</title>

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
            <li class="nav-item dropdown menu-large">
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
          <h1 class="h2">Register</h1>
        </div>
        <div class="col-md-5">
          <ul class="breadcrumb d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Register</li>
          </ul>
        </div>
      </div>
    </div>
</div>
<div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="box">
            <h2 class="text-uppercase">Buat Akun baru</h2>
            <p class="text-muted">Silahkan masukan data diri anda.</p>
            <hr>
            <form method="POST" action="{{ route('home.register') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" >Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="name"">Username</label>
                            <input id="name" type="text" class="form-control" name="username" value="{{ old('username') }}" autocomplete="off" required autofocus>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="name">Phone</label>
                            <input id="name" type="text" class="form-control" name="phone" value="{{ old('phone') }}" autocomplete="off" required autofocus>

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="name">Address</label>
                            {{-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> --}}
                            <textarea class="form-control" name="address" required autofocus></textarea>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                    </div>
                     <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="name">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                        <label for="name">Birth day</label>
                            <input id="name" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required autofocus>

                            @if ($errors->has('birthday'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('birthday') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" >Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                     <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label for="name">Role</label>
                            <select name="role" class="form-control">
                                <option value="member">Member</option>
                                <option value="supplier">Supplier</option>
                            </select>

                            @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection
@section('footer')
    
@endsection