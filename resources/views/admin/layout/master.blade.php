<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @if(request()->is('admin/dashboard'))
  <title>WeShop - Dashboard</title>
  @elseif(request()->is('admin/category'))
  <title>WeShop - List Category</title>
  @elseif(request()->is('admin/products'))
  <title>WeShop - List Product</title>
  @elseif(request()->is('admin/products/create'))
  <title>WeShop - Add Product</title>
  @elseif(request()->is('admin/category/edi'))
  @elseif(request()->is('admin/category'))
  @elseif(request()->is('admin/category'))
  @elseif(request()->is('admin/category'))
  @elseif(request()->is('admin/category'))
  @elseif(request()->is('admin/category'))
  @endif
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('static/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  
  @yield('header')
</head>
<body class="hold-transition sidebar-mini">
  @include('sweet::alert')
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">  
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-gears"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><strong>{{ Auth::user()->name }}</strong></span>
          <div class="dropdown-divider"></div>
          <a href="{{ url('logout') }}" class="dropdown-item">
            <i class="fa fa-sign-out mr-2"></i> Log Out
            {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @yield('sidebar')
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
              <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                  <i class="nav-icon fa fa-tachometer"></i>
                  <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link {{ (request()->is('admin/category')) ? 'active' : '' }}">
                  <i class="nav-icon fa fa-tag"></i>
                  <p>Category</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-truck"></i>
                <p>
                  Products
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('products.index') }}" class="nav-link  {{ (request()->is('admin/products')) ? 'active' : '' }}">
                  <i class="fa fa-list nav-icon"></i>
                    <p>List Products</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('products.create') }}" class="nav-link {{ (request()->is('admin/products/create')) ? 'active' : '' }}">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Add Product</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{ route('transactions.index') }}" class="nav-link {{ (request()->is('transactions/index')) ? 'active' : '' }}">
                <i class="nav-icon fa fa-shopping-cart"></i>
                <p>
                  Transactions
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('media') }}" class="nav-link {{ (request()->is('media')) ? 'active' : '' }}">
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
                  <a href="{{ route('admin.user') }}" class="nav-link {{ (request()->is('admin/user')) ? 'active' : '' }}">
                     <i class="fa fa-users nav-icon"></i>
                     <p>List User</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="{{ route('admin.user.create') }}" class="nav-link  {{ (request()->is('admin/user/create')) ? 'active' : '' }}">
                     <i class="fa fa-plus nav-icon"></i>
                     <p>Add User</p>
                  </a>
               </li>
            </ul>
         </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <br>
    <!-- Main content -->
    <section class="content">
        @yield('body')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('static/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('static/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('static/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('static/dist/js/demo.js') }}"></script>
@yield('footer')
</body>
</html>
