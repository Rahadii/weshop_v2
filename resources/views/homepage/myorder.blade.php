@extends('homepage.index')
@section('header')
    <title>WeShop</title>

@endsection
@section('slide')
 
@endsection
@section('content')
<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">My Orders</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">My Orders</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar mb-0">
            <div id="customer-orders" class="col-md-9">
              <p class="text-muted lead">Apabila ada pertanyaan silahkan hubungi Admin. <a href="#" data-toggle="modal" data-target="#modalContact" class="btn btn-template-outlined">Hubungi</a></p>
              <div class="box mt-0 mb-lg-0">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th width="30px">No</th>
                        <th>Code</th>
                        <th>Member</th>
                        <th>Ekspedisi</th>
                        <th>Status</th>
                        <th>DateTime</th>
                        <th>Menu</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($transaction as $transactions)
                       <tr>
                       <td>{{ $no++ }}</td>
                        <td>{{ $transactions->code }}</td>
                        <td>{{ $transactions->user->name }}</td>
                        <td>{{ $transactions->ekspedisi['name'] }}</td>
                        <td>
                        @if($transactions->status == 0)
                          <a href="#" class="badge badge-danger">Belum</a>
                        @else
                            <a href="#" class="badge badge-success">Sudah</a>
                        @endif
                        </td>
                        <td>{{ $transactions->created_at->format('d/m/Y h:i:s') }}</td>
                    <td>
                        <a href="{{ url('cart/detail/'.$transactions->code) }}" class="btn btn-template-outlined btn-sm">Detail</a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-3 mt-4 mt-md-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Customer section</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                  <li class="nav-item"><a href="{{ url('myprofile') }}" class="nav-link"><i class="fa fa-user"></i> My Account</a></li>
                  <li class="nav-item"><a href="{{ url('cart/myorder') }}" class="nav-link active "><i class="fa fa-list"></i> My Orders</a></li>
                  @if(Auth::user()->role == "supplier")
                    <li class="nav-item"><a href="{{ url('myproduct') }}" class="nav-link "><i class="fa fa-truck"></i> My Product</a></li>
                  @endif
                    <li class="nav-item"><a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('footer')
<!-- Modal -->
<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContact" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tr>
            <td>Nomor Ponsel</td>
            <td>085759339588</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>rahadirpl@gmail.com</td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@show