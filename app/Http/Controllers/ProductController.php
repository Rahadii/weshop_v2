<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use Illuminate\Support\Facades\Auth;
use SweetAlert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::where('parent_id', null)->get();
        return view('admin.products.add', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // for image input
        $file = $request->file('photo');
        $filename = $file->getClientOriginalName();
        $request->file('photo')->move('static/dist/img/products/', $filename);

        // inisialisasi
        $products = new Products();
        
        $products->photo = 'static/dist/img/products/'.$filename;
        $products->slug  = $request->slug;
        $products->name  = $request->name;
        $products->description  = $request->description;
        $products->stock  = $request->stock;
        $products->price  = $request->price;
        $products->category_id  = $request->category_id;
        $products->weight = $request->weight;
        $products->user_id = Auth::user()->id;
        $products->save();

        alert()->success(' ', 'Data Berhasil Diinput!');

        return redirect('admin/products');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::findOrFail($id);
        $categorys = Category::where('parent_id', null)->get();
        return view('admin.products.edit', compact('products','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // for image input
        if($file = $request->file('photo')){
            $filename = $file->getClientOriginalName();
            $request->file('photo')->move('static/dist/img/products/', $filename);
            $img = 'static/dist/img/products/'.$filename;
        }else {
            $img = $request->tmp_image;
        }     

        // inisialisasi
        $products = Products::findOrFail($id);
        
        $products->photo       = $img;
        $products->slug        = $request->slug;
        $products->name        = $request->name;
        $products->description = $request->description;
        $products->stock       = $request->stock;
        $products->price       = $request->price;
        $products->category_id = $request->category_id;
        $products->weight      = $request->weight;
        $products->user_id     = Auth::user()->id;
        $products->save();

        // notify message

        alert()->success(' ', 'Data Berhasil Diubah!');

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::findOrFail($id)->delete();
        return redirect('admin/products')->with(' ','Data Berhasil Dihapus!');
    }
}
