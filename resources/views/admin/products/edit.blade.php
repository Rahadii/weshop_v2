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
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
           <h3 class="card-title">Edit Products</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('products.update',$products->id) }}" enctype="multipart/form-data">
           {{ csrf_field() }} 
           {{ method_field('PUT') }}
           <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $products->name }}">
              </div>
              <div class="form-group">
                 <label for="slug">Slug</label>
                 <input type="text" class="form-control" name="slug" value="{{ $products->slug }}">
              </div>
              <div class="form-group">
                 <label for="desc">Description</label>
                 <textarea id="my-editor" name="description" class="form-control">{{ $products->description }}</textarea>
              </div>
              <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" value="{{ $products->stock }}">
             </div>
             <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" value="{{ $products->price }}">
             </div>
             <div class="form-group">
               <label for="weight">Weight</label>
               <input type="number" class="form-control" name="weight" value="{{ $products->weight }}">
            </div>
              <div class="form-group">
                 <label for="">Parent Category</label>
                 <select name="category_id" class="form-control">
                    <option value="">-</option>
                    @foreach ($categorys as $category)
                        <option 
                        @if($category->id == $products->id)
                            selected="selected"
                        @endif
                        value="{{ $category->id }}">{{ $category->name }}</option>
                        @foreach ($category->children as $sub)
                            <option 
                            @if($products->category_id == $sub->id)
                                selected="selected"
                            @endif
                            value="{{ $sub->id }}"> • {{ $sub->name }} •</option>
                        @endforeach
                    @endforeach
                 </select>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Photo</label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                    <div class="col-md-6">
                        <img src="{{ url($products->photo) }}" width="200">
                        <input type="hidden" name="tmp_image" value="{{ $products->photo }}">
                    </div>
                </div>
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
      height: 100,
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
