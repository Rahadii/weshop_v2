@extends('admin.layout.master')
@section('header')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('static/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('static/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
   .number {
   width: 20px;
   text-align: center;
   }
   li .table-list {
   padding: 3px;
   margin-left: -20px;
   }
   li .none {
   list-style: none;
   }
   .white {
   color: #fff;
   }

   .table td.padding-none, .table th.padding-none {
       padding: 0;
   }
   
   .table td.custom {
       width: 15px;
   }

   span.status-0 {
       background-color: #e67e22;
       padding: 3px 10px;
       border-radius: 2px;
       color: #fff;
       font-weight: 500;
       text-transform: uppercase;
   }

   span.status-1 {
       background-color: #2ecc71;
       padding: 3px 10px;
       border-radius: 2px;
       color: #fff;
       font-weight: 500;
       text-transform: uppercase;
   }
</style>
@endsection

@section('body')
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">          
          
                      <!-- Main content -->
                      <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                          <div class="col-12">
                            <h4>
                              <i class="fa fa-money"></i> Transactions Detail
                              <small class="float-right">Invoice <b>#{{ $transactions->code }}</b></small>
                            </h4>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                          <div class="col-sm-5 invoice-col">
                            <b>Penerima</b>
                            <table class="table table-borderless">
                                <tr>
                                    <td class="padding-none">Nama</td>
                                    <td class="padding-none"><strong>{{ $transactions->user->name }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="padding-none">Alamat</td>
                                    <td class="padding-none"><strong>{{ $transactions->user->address }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="padding-none">Telepon</td>
                                    <td class="padding-none"><strong>{{ $transactions->user->phone }}</strong></td>
                                </tr>
                            </table>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-5 invoice-col">
                            To
                            <table class="table table-borderless">
                                <tr>
                                    <td class="padding-none" width="100">Ekspedisi</td>
                                    <td class="padding-none">
                                        <strong>
                                        {{ $transactions->ekspedisi['code'] }} <br> 
                                        {{ $transactions->ekspedisi['name'] }} <br> 
                                        @currency($transactions->ekspedisi['value']) <br>
                                        {{ $transactions->ekspedisi['etd'] }} hari 
                                        </strong>
                                </tr>
                                <tr>
                                    <td class="padding-none">Status</td>
                                    <td class="padding-none">
                                        @if ($transactions->status == 0)
                                            <span class="status-0">Belum Membayar</span>
                                        @else
                                            <span class="status-1">Lunas</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
          
                        <!-- Table row -->
                        <div class="row">
                          <div class="col-12 table-responsive">
                            <table class="table table-striped">
                              <thead>
                              <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th width="10">Qty</th>
                                <th width="10"></th>
                                <th>Price</th>
                                <th>Sub Total</th>
                              </tr>
                              </thead>
                              <tbody>
                                @php
                                $gt = 0;
                                $no = 1;
                                @endphp
                              @foreach ($transactionsDetail as $td)
                              <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $td->product->name }}</td>
                                <td>{{ $td->qty }}</td>
                                <td>x</td>
                                <td>@currency($td->product->price)</td>
                                <td>@currency($td->qty * $td->product->price)</td>
                              </tr>
                              <?php $gt = $gt + $td->subtotal;?>
                              @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
          
                        <div class="row">
                          <!-- accepted payments column -->
                          <div class="col-6">
                            <p class="lead"> Rekening Bank:</p>
                    <img src="https://www.peduligenerasi.org/wp-content/uploads/2018/11/logo-bank-bca.png" alt="BCA" width="100">
  
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                      Halaman ini merupakan halaman transaksi, pengiriman pembayaran dilakukan melalui rekening bank.
                    </p>
                          </div>
                          <!-- /.col -->
                          <div class="col-6">
                            {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

                            <div class="table-responsive">
                              <table class="table">
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td>@currency($gt)</td>
                                </tr>
                                <tr>
                                  <th>Ongkir:</th>
                                  <td>@currency($td->ekspedisi['value'])</td>
                                </tr>
                                <tr>
                                  <th>Grand Total:</th>
                                  <td><h3><b>@currency($gt + $td->ekspedisi['value'])</b></h3></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
          
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                          <div class="col-12">
                            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                            <button type="button" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Submit Payment
                            </button>
                            <a class="btn btn-primary float-right" style="margin-right: 5px;" href="{{ url('admin/transactions/'.$transactions->code.'/detail/data/cetak') }}">
                              <i class="fa fa-download"></i> Generate Invoice</a>
                          </div>
                        </div>
                      </div>
                      <!-- /.invoice -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </section>
              <!-- /.content -->
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
   </div>
</div>
@endsection
@section('footer')
<!-- DataTables -->
<script src="{{ asset('static/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('static/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('static/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('static/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- page script -->
<script>
   $(function () {
   //   $("#example").DataTable({
   //     "responsive": true,
   //     "autoWidth": false,
   //   });
     $('#example1').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "responsive": true,
       "lengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]]
     });
   });
</script>
@endsection
@show