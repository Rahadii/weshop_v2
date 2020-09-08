<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h1>WeShop - Verifikasi Akun</h1>
                    <img src="{{ url('homepage/img/weshop.png') }}" alt="">
                    <p>Silahkan Klik <a href="{{ url('verifikasi/register/'.$remember_token) }}">Aktivasi Akun</a> untuk melanjutkan verifikasi dan mengaktifkan akun anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>