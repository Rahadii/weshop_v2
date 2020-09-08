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
              <h1 class="h2">My Products</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">My Products</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar mb-0">
            <div id="customer-orders" class="col-md-9">
              <p class="text-muted lead">Apabila ada pertanyaan silahkan hubungi ADMIN.</p>
              <div class="box mt-0 mb-lg-0">
                <div class="table-responsive">
                <!-- form start -->
        <form method="POST" action="{{ url('addproduct') }}" enctype="multipart/form-data">
            {{ csrf_field() }} 
            <div class="card-body">
               <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Product Name" autocomplete="off">
               </div>
               <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Enter Slug" autocomplete="off">
               </div>
               <div class="form-group">
                  <label for="desc">Description</label>
                  <textarea id="my-editor" name="description" class="form-control">{!! old('description') !!}</textarea>
               </div>
               <div class="form-group">
                 <label for="stock">Stock</label>
                 <input type="number" class="form-control" name="stock" placeholder="Enter Stock">
              </div>
              <div class="form-group">
                 <label for="price">Price</label>
                 <input type="number" class="form-control" name="price" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="weight">Weight (gram)</label>
                <input type="number" class="form-control" name="weight" autocomplete="off">
             </div>
               <div class="form-group">
                  <label for="">Parent Category</label>
                  <select name="category_id" class="form-control">
                     <option value="">-</option>
                     @foreach ($category as $categorys)
                         <option value="{{ $categorys->id }}">{{ $categorys->name }}</option>
                         @foreach ($categorys->children as $sub)
                             <option value="{{ $sub->id }}"> • {{ $sub->name }} •</option>
                         @endforeach
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                 <label for="slug">Photo</label>
                 <input type="file" class="form-control" name="photo">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
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
                    <li class="nav-item"><a href="customer-orders.html" class="nav-link active"><i class="fa fa-list"></i> My orders</a></li>
                    <li class="nav-item"><a href="customer-wishlist.html" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a></li>
                    <li class="nav-item"><a href="customer-account.html" class="nav-link"><i class="fa fa-user"></i> My account</a></li>
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
 
 <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
 <script>
   var route_prefix = "/filemanager";
 </script>
 
 <!-- CKEditor init -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
 <script>
    $('textarea[name=description]').ckeditor({
       height: 250,
       filebrowserImageBrowseUrl: route_prefix + '?type=Images',
       filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
       filebrowserBrowseUrl: route_prefix + '?type=Files',
       filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
     });
   </script>
 <script>
    CKEDITOR.replace('my-editor', options);
 </script> 
@endsection
@show