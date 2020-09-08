<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Providers\SweetAlertServiceProvider;
use SweetAlert;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function index(){
        $categorys = Category::where('parent_id', null)->get();
        return view('admin.category.index', compact('categorys'));
    }

    public function store(Request $request){
       
        $category = new Category();
        $category->name         = $request->name;
        $category->slug         = $request->slug;
        $category->icon         = $request->icon;
        $category->user_id      = Auth::user()->id;
        $category->parent_id    = $request->parent_id;
        $category->save();

        alert()->success(' ','Data Berhasil Diinput!')->persistent('close');

        // redirect ke halaman awal
        return redirect()->back();
    }

    public function edit(Request $request, $id){
        $category = Category::findOrFail($id);
        $categorys = Category::where('parent_id', null)->get();
        
        return view('admin.category.edit', compact('category','categorys'));
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->icon = $request->icon;
        $category->parent_id = $request->parent_id;
        $category->save();

        alert()->success('Data Berhasil Diubah!')->persistent('close'); // sweetalert

        return redirect('admin/category');
    }

    public function destroy($id){
        // $category = Category::findOrFail($id);
        // $category->delete();

        // alert()->success('Data Berhasil Dihapus!');

        // return redirect('admin/category');

        $category = Category::findOrFail($id)->delete(); 
        return redirect('admin/category')->with(' ','Data Berhasil Dihapus!');
    }
}
