<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\User;
use Mail;
use SweetAlert;
use Auth;

class AuthController extends Controller
{
    protected $category;
    
    public function __construct()
    {   
        $this->category = Category::where('parent_id', null)->get();
    }
    
    public function register(){
        $category = $this->category;
        return view('homepage.register', compact('category'));
    }

    public function store(Request $data)
    {
        $remember_token = base64_encode($data['email']);
        $myData = [
            'name' => $data['name'],
            'username' => $data['username'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'role' => $data['role'],
            'email' => $data['email'],
            'status' => "0",
            'password' => Hash::make($data['password']),
            'remember_token' => $remember_token,
        ];

        User::create($myData);
        Mail::send('home', array('firstname' => $data['name'],'remember_token' => $remember_token) , function($pesan) use($data){
            $pesan->to($data['email'],'Verifikasi')->subject('Verifikasi Email [WeShop]');
            $pesan->from('rahadirpl@gmail.com','Verifikasi Akun WeShop');
        });

        alert()->success(' ','Register Berhasil dilakukan, Silahkan Cek Email Anda untuk Aktivasi!');
        return redirect('/');
    }

    public function verifikasi($token){
        $user = User::where('remember_token', $token)->first();
        if($user->status == "0"){
            $user->status = "1";
        }
        $user->save();
        alert()->success(' ','Verifikasi Berhasil, Silahkan Login');
        return redirect('auth/register');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $cek = User::where('id', Auth::user()->id)->first();
            if($cek->status == "0"){
                Auth::logout();
                alert()->error('Akun Anda Belum Terverifikasi','Oops');
                return redirect('/');
            
            }else{
                return redirect()->back();
            }
        }else {
            alert()->error('Email atau Password Salah!','Oops');
            return redirect('/');
        }
    }
}
