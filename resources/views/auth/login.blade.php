<style>
body {
    width: 100vw;
    height: 100vh;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-div {
    max-width: 430px;
    min-width: 330px;
    padding: 35px;
    border: 1px solid #fff;
    border-radius: 8px;
    position: relative;
    background-color: #fff;
    margin-left: 600px;
}

h5.text {
    color: #000;
}

.logo img {
    margin-left: 80px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto;
}

.center {
    align-items: center;
}
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <title>WeShop - Login Admin</title>
</head>

<body style="background: url({{ asset('static/dist/img/bg-login.jpg') }}); height: 100%;background-position: center; background-repeat: no-repeat;background-size: cover;">
    <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="login-div">
        <div class="row">
            <div class="logo center">
                <img src="{{ asset('static/dist/img/male-user.png') }}"
                    alt="">
            </div>
        </div>
        <div class="row center-align">
            <h5 class="text">Login</h5>
            {{-- <h6><strong>Administrator</strong></h6> --}}
        </div>
        <div class="row">
            <div class="input-field">
                <input type="email" name="email" id="email_input" class="validate" autocomplete="off">
                <label for="email_input">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input type="password" name="password" id="password" class="validate">
                <label for="password">Password</label>
                <div><a href="#"><strong>Forgot Password?</strong></a></div>
            </div>
        </div>
        <div class="row">
            
        </div>

        <div class="row"></div>
        <div class="row">
            <div class="col s6 pad"></div>
            <div class="col s6 right-align">
                <button class="btn waves-effect waves-light" type="submit">Login
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </div>
    </form>
</body>

</html>