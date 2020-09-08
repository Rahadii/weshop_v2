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
              <h1 class="h2">My Account</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">My Account</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
          <div class="col-md-9" id="customer-orders">
            <form method="POST" action="{{ url('updateprofile') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                  <div class="col-md-6">
                      <input type="hidden" name="id" value="{{$user->id}}">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                  <div class="col-md-6">
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required autofocus>
                    @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                  <div class="col-md-6">
                    <textarea name="address" id="address" rows="3" class="form-control" required autofocus>{{ $user->address }}
                    </textarea>
                    @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                  <div class="col-md-6">
                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" required autofocus>
                    @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                  <div class="col-md-6">
                    <select name="gender" class="form-control">
                      @if ($user->gender == "L")
                          <option value="L" selected>Laki-Laki</option>
                          <option value="P">Perempuan</option>
                      @else
                          <option value="L">Laki-Laki</option>
                          <option value="P" selected>Perempuan</option>
                      @endif                    
                    </select>
                    @if ($errors->has('gender'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>
                  <div class="col-md-6">
                    <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ $user->birthday }}" required autofocus>
                    @if ($errors->has('birthday'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birthday') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                  <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="role" id="" value="{{$user->role}}" readonly>
                    @if ($errors->has('role'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('role') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Photos') }}</label>
                    <div class="col-md-6">
                        <input type="file" name="file" class="form-control"><br>
                        <img src="{{ url($user->photos) }}" width="150">
                        <input type="hidden" name="tmp_image" value="{{ $user->photos }}">
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                    </button>
                    <a href="{{ url('admin/user') }}" class="btn btn-default">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-3 mt-4 mt-md-0">
            <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  @if(Auth::user()->role == "member")
                  <h3 class="h4 panel-title">Customer section</h3>
                  @else 
                  <h3 class="h4 panel-title">Supplier section</h3>
                  @endif
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="{{ url('myprofil') }}" class="nav-link active"><i class="fa fa-user"></i> My Account</a></li>
                    <li class="nav-item"><a href="{{ url('cart/myorder') }}" class="nav-link "><i class="fa fa-list"></i> My Orders</a></li>
                    @if(Auth::user()->role == "supplier")
                        <li class="nav-item"><a href="{{ url('myproduct') }}" class="nav-link "><i class="fa fa-truck"></i> My Product</a></li>
                    @endif
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