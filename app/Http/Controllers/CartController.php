<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Products;
use App\Category;
use App\Transactions;
use Cart;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use SweetAlert;

class CartController extends Controller
{
    protected $category ;
	public function __construct(){
		$this->category = Category::where('parent_id', null)->get();
	}
    public function index(Request $req){
    	// Cart::destroy();
    	$product = Products::findOrFail($req->id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $req->qty, 'price' => $product->price]);
        
        alert()->success('Produk berhasil dimasukkan ke dalam Keranjang','Info!');
    	return redirect('keranjang');
    }

    public function keranjang(){
    	$category = $this->category;
    	return view('homepage.keranjang',compact('category'));
    }

    public function update(Request $req){
    	Cart::update($req->rowid, $req->qty);
    	$category = $this->category;
    	return redirect('keranjang');
    }

    public function delete($rowid){
    	Cart::remove($rowid);
        $category = $this->category;
        
        alert()->success('List Produk Berhasil dihapus dari keranjang!','Info!');
    	return redirect('keranjang');
    }

    public function formulir(){
        $category = $this->category;
        return view('homepage.formulir',compact('category'));

        // echo city();
    }
    
    public function transaction(Request $req){
        foreach (Cart::content() as $row) {
            $product = Products::findOrFail($row->id);
            $city = json_decode(City(), true);
            
            $weight = $product->weight * $row->qty;
            foreach ($city['rajaongkir']['results'] as $key) {
                // 
                $product->stock = $product->stock * $row->qty;
                $product->save();
                // 
                if($product->user->address == $key['city_name']){
                    $cost = Cost($key['city_id'],$req->city, $weight,$req->eks);
                    $data = json_decode($cost,true);
                    // $hasil = $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
                    Cart::update($row->rowId,['options' => [
                        'code'  => $data['rajaongkir']['results'][0]['code'],
                        'name'  => $data['rajaongkir']['results'][0]['name'],
                        'value' => $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'],
                        'etd'   => $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['etd']
                    ]]);
                    
                    // return Cart::content();

                    $eks = [
                        'code'  => $row->options->code,
                        'name'  => $row->options->name,
                        'value' => $row->options->value,
                        'etd'   => $row->options->etd
                     ];

                    $transaction              = new Transactions;
                    $transaction->code        = date('ymdhi').Auth::user()->id;
                    $transaction->user_id     = Auth::user()->id;
                    $transaction->product_id  = $product->id;
                    $transaction->qty         = $row->qty;
                    $transaction->subtotal    = $row->subtotal;
                    $transaction->name        = $req->name;
                    $transaction->address     = $req->city;
                    $transaction->postal_code = $req->postal_code;
                    $transaction->ekspedisi   = $eks;
                    $transaction->save();

                    Cart::remove($row->rowId);
                }
                if(Cart::count() == 0){
                    alert()->success('Transaksi Berhasil Dilakukan! Silahkan Lakukan Konfirmasi Pembayaran','Info');
                    return redirect('cart/myorder');
                }
            }
        }
    }

    public function myorder(){
        $category = $this->category;
        $transaction = Transactions::groupBy('code')->orderBy('id','DESC')->where('user_id',Auth::user()->id)->get();
        return view('homepage.myorder',compact('category','transaction'));
    }

    public function detail($code){
        $transaction = Transactions::groupBy('code')->orderBy('id','DESC')->where('code',$code)->first();
		$transactiondetail = Transactions::orderBy('id','DESC')->where('code',$code)->get();
        $category = $this->category;
        return view('homepage.detailtransaksi',compact('category','transaction','transactiondetail'));
    }

    public function product(){
        $category = $this->category;
        $product = Products::where('user_id',Auth::user()->id)->get();
        return view('homepage.myproduct',compact('product','category'));
    }

    public function addproduct(){
        $category = $this->category;
        // $mycategorys = Category::where('parent_id',null)->get();
        return view('homepage.addproduct',compact('category'));
    }

    public function saveproduct(Request $request){
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

        return redirect('myproduct');
    }

    public function editproduct($id){
        $category = $this->category;
        $products = Products::find($id);
        // $categorys = Category::where('parent_id',null)->get();
        return view('homepage.editproduct',compact('products','category'));
    }

    public function updateproduct(Request $request)
    {
        $id = $request->id;
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

        // notif message

        alert()->success(' ', 'Data Berhasil Diubah!');

        return redirect('myproduct');
    }

    public function deleteproduct($id){
        $product = Products::find($id)->delete();
        return redirect('myproduct')->with('','Data Berhasil Dihapus!');
    }
}
