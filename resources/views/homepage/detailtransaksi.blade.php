@extends('homepage.index')
@section('header')
    <title>WeShop - Jual Gedget dan Komputer</title>

@endsection
@section('slide')
 
@endsection
@section('content')
<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Order # {{ $transaction->code}}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="customer-orders.html">My Orders</a></li>
                <li class="breadcrumb-item active">Order # 1735</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div id="customer-order" class="col-lg-9">
              <p>Silahkan Lakukan Pembayaran. Apabila sudah melakukan pembayaran, silahkan hubungi Admin</a>
              <a href="#" data-toggle="modal" data-target="#modalContact" class="btn btn-template-outlined">Hubungi admin</a>
              <div class="box">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th  colspan="2" class="border-top-0">Product</th>
                        <th class="border-top-0">Qty</th>
                        <th class="border-top-0">Price</th>
                        <th class="border-top-0">Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
     
                    @php
                    $gt = 0;
                    @endphp
                    @foreach($transactiondetail as $td)
                    <tr>
                    
                    <td> <img src="{{ url($td->product->photo) }}" alt="Black Blouse Armani" class="img-fluid"> </td>
                    <td> {{ $td->product->name }}</td>
                    <td>{{ $td->qty }}</td>
                    <td> {{ number_format($td->product->price,2,",",".") }}</td>
                    <td>{{ number_format($td->subtotal,2,",",".") }}</td>
                    </tr>
                    <?php $gt = $gt + $td->subtotal;?>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="4" class="text-right ">Order subtotal</th>
                        <th>{{ number_format($gt,2,",",".") }}</th>
                      </tr>
                      <tr>
                        <th colspan="4" class="text-right">Ongkir</th>
                        <th>{{ number_format($transaction->ekspedisi['value'],2,",",".") }}</th>
                      </tr>
                      <tr>
                        <th colspan="4" class="text-right">Grand Total</th>
                        <th><?php echo number_format($gt + $transaction->ekspedisi['value'], 2, ",", "."); ?></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="row addresses">
                  <div class="col-md-6 text-right">
                    <h3 class="text-uppercase">Pengirim</h3>
                    <p>
                    {{ $transaction->product->user->name }}<br>
                     {{ $transaction->product->user->address }}<br><br>	
                     <span class="text-uppercase text-bold">Ekspedisi</span> <br>
                    {{ $transaction->ekspedisi['name'] }} <br>
                     {{ $transaction->ekspedisi['etd'] }} day <br>				    
                    </p>
                  </div>
                  <div class="col-md-6 text-right">
                    <h3 class="text-uppercase">Penerima</h3>
                    <p> {{ $transaction->name }} (<strong>{{ $transaction->user->name}})</strong><br>
                        {{ $transaction->address }}<br>
                        {{ $transaction->postal_code }}<br>
                        @if($transaction->status == 0)
                        Status : <strong>Belum (Pending)</strong>
                        @else
                        Status : <strong>Lunas</strong>
                        @endif
                    </p>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  @if(Auth::user()->role == "member")
                  <h3 class="h4 panel-title">Customer section</h3>
                  @else
                  <h3 class="h4 panel-title">Supplier section</h3>
                  @endif
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="{{ url('cart/myorder') }}" class="nav-link active"><i class="fa fa-list"></i> My Orders</a></li>
                    @if(Auth::user()->role == "supplier")
                    <li class="nav-item"><a href="{{ url('myproduct') }}" class="nav-link"><i class="fa fa-truck"></i> My Products</a></li>
                    @else

                    @endif
                    <li class="nav-item"><a href="{{ url('myprofile') }}" class="nav-link"><i class="fa fa-user"></i> My Account</a></li>
                    <li class="nav-item"><a href="{{ url('logout') }}" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('footer')
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
            <td><img src="{{ url('homepage/img/bca.png') }}" width="150"></td>
            <td>0213039203</td>
          </tr>
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