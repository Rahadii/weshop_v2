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
            <h3 class="card-title">Users</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th width="30px" class="text-center">No</th>
                     <th>Photo</th>
                     <th>Name</th>
                     <th>Username</th>
                     <th>Email</th>
                     <th>Address</th>
                     <th>Gender</th>
                     <th>Status</th>
                     <th>Role</th>
                     <th>Action</th>
                  </tr>
               </thead>
               @php
                $no = 1;
                @endphp
               <tbody>
                @foreach ($user as $users)
                <tr>
                <td>{{ $no++ }}</td>
                <td><img src="{{ url($users->photos) }}" width="50"></td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->username }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->address }}</td>
                <td>{{ $users->gender }}</td>
                <td>
                    @if($users->status == 0)
                    <a href="{{ url('admin/user/status/'.$users->id) }}" class="btn btn-danger btn-sm">Tidak Aktif</a>
                    @else
                    <a href="{{ url('admin/user/status/'.$users->id) }}" class="btn btn-success btn-sm">Aktif</a>
                    @endif
                </td>
                <td>{{ $users->role }}</td>
                <td align="center">
                    <a href="{{ url('admin/user/edit/'.$users->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                    <a href="{{ url('admin/user/delete/'.$users->id) }}" class="btn btn-danger delete-confirm btn-sm"><i class="fa fa-trash-o"></i></a>
                </td>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Yakin Menghapus Data?',
        text: 'Record ini akan terhapus secara permanen!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>
@endsection
@show
