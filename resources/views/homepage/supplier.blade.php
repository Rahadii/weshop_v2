@extends('homepage.index')
@section('header')
    <title>Supplier - WeShop</title>
@endsection
@section('slide')
    
@endsection
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">Our Team</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Supplier</li>
              </ul>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <section class="bar mb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Supplier</h2>
                    </div>
                    <div class="row text-center">
                        @foreach ($user as $users)
                        <div class="col-md-2 col-sm-3">
                            <div data-animate="fadeInUp" class="team-member">
                            <div class="image">
                                <a href="#"><img src="{{ url($users->photos) }}" alt="" class="img-fluid rounded-circle"></a></div>
                                <h3><a href="{{ url('penjual/'.$users->id) }}">{{ $users->name }}</a></h3>
                                <p class="role">{{ date('d/m/y',strtotime($users->created_at)) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
              </div>
            </div>
          </section>
        </div>
    </div>
@endsection
@section('footer')
    
@endsection