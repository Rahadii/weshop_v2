@extends('admin.layout.master')
@section('header')
<link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/72px color.png') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@endsection
@section('body')
<div class="row">
   <div class="col-md-12">
       <div class="box box-primary">
            <iframe src="/filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
       </div>
   </div>
</div>
@endsection
@section('footer')
<script>
    var route_prefix = "/filemanager";
</script>
<script>
     {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
</script>
   <script>
     $('#lfm').filemanager('image', {prefix: route_prefix});
     // $('#lfm').filemanager('file', {prefix: route_prefix});
   </script>
   <script>
     $(document).ready(function(){
 
       // Define function to open filemanager window
       var lfm = function(options, cb) {
         var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
         window.open(route_prefix + '?type=' + options.type || 'image', 'FileManager', 'width=900,height=600');
         window.SetUrl = cb;
       };
     });
   </script>
@endsection
@show
