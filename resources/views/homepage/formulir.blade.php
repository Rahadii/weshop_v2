@extends('homepage.index')
@section('header')
    <title>Formulir - WeShop</title>

@endsection
@section('slide')
 
@endsection
@section('content')
   <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Shopping Cart</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Shopping Cart</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-lg-12">
              <p class="text-muted lead">Kamu memiliki {{ Cart::count() }} item(s) di dalam keranjang.</p>
            </div>
            
            <form action="{{ url('cart/transaction') }}" method="POST">
            {{ @csrf_field() }}
            <div id="basket" class="col-lg-9">
              <div class="box mt-0 pb-0 no-horizontal-padding">
                <div class="content">
                   <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="company">Name (Member)</label>
                               <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email (Member)</label>
                          <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly="">  
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="firstname">Name</label>
                          <input id="firstname" type="text" name="name" class="form-control" placeholder="Masukan Nama Penerima" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">City</label>
                         <select class="form-control" onchange="check()" id="city" name="city">
                              @php
                                  $city = city();
                                  $city = json_decode($city,true);
                              @endphp
                              @foreach($city['rajaongkir']['results'] as $citys)
                              <option value="{{ $citys['city_id'] }}">{{ $citys['city_name'] }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Provinsi</label>
                           <input type="text" value="" class="form-control" id="provinsi" readonly="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                              <label for="zip">Kode POS</label>
                              <input  type="text" class="form-control" name="postal_code" id="postal_code" readonly="">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                          <label for="city">Ekspedisi</label>
                          <select class="form-control" name="eks">
                            <option value="jne">JNE</option>
                            <option value="pos">POS Indonesia (POS)</option>
                            <option value="tiki">TIKI</option>
                          </select>
                        </div>
                      </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                    </div>
                  </form>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div id="order-summary" class="box mt-0 mb-4 p-0">
                <div class="box-header mt-0">
                  <h3>Order summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Order subtotal</td>
                        <th><?php echo Cart::total(); ?></th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th><?php echo Cart::total(); ?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('footer')
  <script type="text/javascript">
    function check (){
      var id = $("#city").val();
      $.ajax({
        type: "GET",
        url : "{{ url('citybyid/') }}/"+id,
        dataType : "JSON",
        success:function(data){
          $("#provinsi").val(data.rajaongkir.results.province)
          $("#postal_code").val(data.rajaongkir.results.postal_code)
        }
      });
    }
  </script>
@endsection
@show

