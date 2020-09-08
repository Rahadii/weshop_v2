<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index(){
        $user = User::where('id','!=', Auth::user()->id)->get();
        // $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function changeStatus($id){
        $user = User::findOrFail($id);

        if($user->status == "0"){
            $change = "1";
        }else{
            $change = "0";
        }

        User::where('id',$id)->update(['status' => $change]);
        alert()->success(' ', 'Status Berhasil Diubah!');
        return redirect('admin/user');
    }

    public function create(){
        return view('admin.user.add');
    }

    public function store(Request $data){
        $userData = ([
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
        ]);

        User::create($userData);
        alert()->success(' ', 'Data User Berhasil ditambah!');
        return redirect('admin/user');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $data){
        $userData = ([  
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
        ]);
        
        User::where('id',$data->id)->update($userData);
        alert()->success(' ', 'Data User Berhasil Diubah!');
        return redirect('admin/user'); 
    }

    public function delete($id){
        $user = User::findOrFail($id)->delete(); 
        return redirect('admin/user')->with(' ','Data Berhasil Dihapus!');
    }
}
