@extends('admin.layout.master')
    @section('header')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('static/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <style>
      .number {
        width: 20px;
        text-align: center;
      }

      .table-list {
        padding: 3px;
        margin-left: -10px;
      }

      li .none {
        list-style: none;
      }
    </style>
    @endsection
    @section('sidebar')
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('static/dist/img/AdminLTELogo.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><b>WeShop</b></span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../../{{ Auth::user()->photos }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"> {{ Auth::user()->name }} </a>
          </div>
        </div>
      </div>
      <!-- /.sidebar -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fa fa-tachometer"></i>
              <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('category.index') }}" class="nav-link active">
              <i class="nav-icon fa fa-tag"></i>
              <p>Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fa fa-truck"></i>
              <p>Product</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('transactions.index') }}" class="nav-link">
            <i class="nav-icon fa fa-shopping-cart"></i>
            <p>
              Transactions
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('media') }}" class="nav-link">
              <i class="nav-icon fa fa-image"></i>
              <p>Media</p>
           </a>
       </li>
       <li class="nav-item has-treeview">
        <a href="" class="nav-link">
           <i class="nav-icon fa fa-user"></i>
           <p>
              User
              <i class="fa fa-angle-left right"></i>
           </p>
        </a>
        <ul class="nav nav-treeview">
           <li class="nav-item">
              <a href="{{ route('admin.user') }}" class="nav-link">
                 <i class="fa fa-users nav-icon"></i>
                 <p>List User</p>
              </a>
           </li>
           <li class="nav-item">
              <a href="{{ route('admin.user.create') }}" class="nav-link">
                 <i class="fa fa-plus nav-icon"></i>
                 <p>Add User</p>
              </a>
           </li>
        </ul>
     </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
    @endsection
    @section('body')
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{ route('category.update', $category->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }} 
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{ $category->slug }}">
              </div>
              <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" name="icon" value="{{ $category->icon }}">
              </div>
              <div class="form-group">
                  @if ($category->parent_id == null)
                      
                  @else
                    <label for="parent_id">Parent Category</label>
                    <select name="parent_id" class="form-control">
                        @foreach ($categorys as $cas)
                            <option value="{{ $cas->id }}"
                                @if ($cas->id == $category->parent_id)
                                    selected="selected"
                                @endif
                            >{{ $cas->name }}</option>
                        @endforeach
                    </select>
                @endif
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-warning">Submit</button>
              <a href=".." class="btn btn-default">Back</a>
            </div>
          </form>
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