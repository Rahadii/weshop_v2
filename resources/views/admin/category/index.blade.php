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
   <div class="col-md-4">
      <!-- general form elements -->
      <div class="card card-primary">
         <div class="card-header">
            <h3 class="card-title">Add Category</h3>
         </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form method="POST" action="{{ url('admin/category') }}">
            {{ csrf_field() }} 
            <div class="card-body">
               <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" autocomplete="off">
               </div>
               <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Enter Slug" autocomplete="off">
               </div>
               <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control" name="icon" placeholder="Enter Icon" autocomplete="off">
               </div>
               <div class="form-group">
                  <label for="parent_id">Parent Category</label>
                  <select name="parent_id" class="form-control">
                     <option value="">-</option>
                     @foreach ($categorys as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
      <!-- /.card -->
   </div>
   <div class="col-md-8">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Data Category and Sub Category</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th width="400">Category</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach ($categorys as $category)
                  <tr>
                     <td class="number">{{ $no++ }}</td>
                     <td>
                        {{ $category->name }}
                        <ul>
                           @foreach ($category->children as $subCategory)
                           <li class="table-list">{{ $subCategory->name }}</li>
                           @endforeach
                        </ul>
                     </td>
                     <td>
                        <a href="{{ url('admin/category/'. $category->id.'/edit') }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                        <a href="{{ url('admin/category/destroy/'.$category->id) }}" class="btn btn-danger delete-confirm btn-xs"><i class="fa fa-trash"></i> </a>
                        <ul>
                           @foreach ($category->children as $subCategory)
                              <li class="table-list" style="margin-left: -40px; list-style: none;">
                                 <a href="{{ url('admin/category/'.$subCategory->id.'/edit') }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> </a>
                                 <a href="{{ url('admin/category/destroy/'.$subCategory->id) }}" class="btn btn-danger delete-confirm btn-xs"><i class="fa fa-trash"></i></a>
                              </li>
                           @endforeach
                        </ul>
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
       "lengthMenu": [[2, 10, 20, 50, -1], [2, 10, 20, 50, "All"]]
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

{{-- 
   "E:\MyData\Data Perkuliahan\Semester 6\Tugas-Akhir\"
   --}}