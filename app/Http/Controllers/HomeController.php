<?php

namespace App\Http\Controllers;
use App\Category;
use App\Products;
use App\User;
use App\Transactions;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category     = Category::all();
        $products     = Products::all();
        $user         = User::all();
        $transactions = Transactions::all();
        return view('admin.dashboard', compact('category','products','user','transactions'));
    }

    public function media(){
        return view('admin.media');
    }
}
