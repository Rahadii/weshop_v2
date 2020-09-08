<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\User;
use Auth;
use UxWeb\SweetAlert\SweetAlert;

class BerandaController extends Controller
{
    protected $category;

    public function __construct()
    {
        // untuk mengambil value category beserta sub category
        $this->category = Category::where('parent_id', null)->get();
    }

    public function index(){
        $category = $this->category;
        $products = Products::take(12)->orderBy('id','DESC')->get();
        return view('homepage.homepage', compact('products','category'));
    }

    public function product(){
        $category = $this->category;
        $products = Products::orderBy('id','DESC')->Paginate(8);
        return view('homepage.product', compact('products','category'));
    }

    public function productByCategory($slug){
        $categorys = Category::where('slug', $slug)->first();
        $id = $categorys->id;
        $category = $this->category;
        $categoryName = $categorys->name;
        $products = Products::orderBy('name','ASC')->where('category_id',$id)->get();
        return view('homepage.productByCategory', compact('products','category','categoryName'));
    }

    public function detailProduct($slug){
        $products = Products::where('slug',$slug)->first();
        $category = $this->category;
        return view('homepage.detailProduct',compact('products','category'));
    }

    // show data penjual
    public function penjual(){
        $category = $this->category;
        $user = User::orderBy('id','DESC')->where('status','1')->where('role','!=','member')->get();
        return view('homepage.supplier', compact('category','user'));
    }

    // show product berdasarkan penjual
    public function productByPenjual($id){
        $category = $this->category;
        $user = User::findOrFail($id);
        $products = $user->product;
        return view('homepage.productByPenjual',compact('products','category','user'));
    }

    public function myprofile(){
        $category = $this->category;
        $user     = User::where('id',Auth::user()->id)->first();
        return view('homepage.myprofile',compact('category','user'));
    }
    
    public function updateprofile(Request $data){
      if( $file = $data->file('file'))
          {
              $filename = $file->getClientOriginalName();
              $data->file('file')->move('static/dist/img/',$filename);
              $img = 'static/dist/img/'.$filename;
          }else
          {
              $img = $data->tmp_image ;
          }
      $mydata = ([
          'name'     => $data['name'],
          'email'    => $data['email'],
          'username' => $data['username'],
          'address'  => $data['address'],
          'phone'    => $data['phone'],
          'gender'   => $data['gender'],
          'birthday' => $data['birthday'],
          'role'     => $data['role'],
          'status'   => "0",
          'photos'   => $img,
          'password' => bcrypt($data['password']),
      ]);
        User::where('id',$data->id)->update($mydata);
        alert()->success(' ','Profil Berhasil diperbaharui!');
        return redirect('myprofile');
    }
    
    public function logout(){

        if(Auth::user()->role == 'admin'){
            Auth::logout();

            alert()->success(' ','Logout Berhasil!');
            return redirect('/login');    
        } else {
            Auth::logout();

            alert()->success(' ','Logout Berhasil!');
            return redirect('/');
        }
   }
}