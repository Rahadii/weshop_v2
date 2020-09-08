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
</style>
@endsection

@section('body')
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Transactions</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th width="30px" class="text-center">No</th>
                     <th>Code</th>
                     <th>Member</th>
                     <th>Ekspedisi</th>
                     <th class="text-center">Status</th>
                     <th class="text-center">Menu</th>
                  </tr>
               </thead>
               <tbody>
                    @php 
                    $no = 1;
                    @endphp
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $transaction->code }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->ekspedisi['name'] }}</td>  
                        <td class="text-center">
                            @if ($transaction->status == 0)
                                <a href="{{ url('admin/transactions/'.$transaction->code.'/'.$transaction->status) }}" class="btn btn-danger btn-sm">Belum</a>
                            @else
                                <a href="{{ url('admin/transactions/'.$transaction->code.'/'.$transaction->status) }}" class="btn btn-success btn-sm">Sudah</a>
                            @endif    
                        </td>
                        <td class="text-center"><a href="{{ url('admin/transactions/'.$transaction->code.'/detail/data') }}" class="btn btn-info btn-sm">Detail</a></td>                      
                    </tr>
                    @endforeach
               </tbody>
               <tfoot>
               </tfoot>
            </table>
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