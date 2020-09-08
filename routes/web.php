<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','BerandaController@index')->name('homepage.index');
Route::get('/product','BerandaController@product');
Route::get('/category/{slug}','BerandaController@productByCategory');
Route::get('/penjual/{id}','BerandaController@productByPenjual');
Route::get('product/detail/{slug}','BerandaController@detailProduct');
Route::get('penjual','BerandaController@penjual');

Route::get('auth/register','AuthController@register');
Route::post('auth/register','AuthController@store')->name('home.register');
Route::get('verifikasi/register/{token}','AuthController@verifikasi');
Route::post('auth/login','AuthController@login');

// cart
Route::post('/cart','CartController@index');
Route::get('keranjang','CartController@keranjang');
Route::post('cart/update','CartController@update');
Route::get('cart/delete/{rowid}','CartController@delete');
Route::get('cart/formulir','CartController@formulir');
Route::post('cart/transaction','CartController@transaction');
Route::get('cart/myorder','CartController@myorder');
Route::get('cart/detail/{code}','CartController@detail');
// ->middleware('oauth:supplier')
Route::get('myproduct','CartController@product');
Route::get('addproduct','CartController@addproduct');
Route::post('addproduct','CartController@saveproduct');
Route::get('editproduct/{id}','CartController@editproduct');
Route::post('editproduct','CartController@updateproduct');
Route::get('deleteproduct/{id}','CartController@deleteproduct');
Route::get('myprofile','BerandaController@myprofile');
Route::post('updateprofile','BerandaController@updateprofile');
Route::get('logout','BerandaController@logout');

Route::get('citybyid/{id}', function ($id) {
    return city($id);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('media','HomeController@media')->name('media');
    Route::get('dashboard','HomeController@index')->name('dashboard');
    Route::get('category','CategoryController@index');
    // Route::post('category','CategoryController@store');
    Route::resource('category','CategoryController');
    Route::get('category/destroy/{id}','CategoryController@destroy');
    Route::resource('products','ProductController');
    Route::get('products/destroy/{id}','ProductController@destroy');
    // Transactions Routes
    Route::get('transactions','TransactionController@index')->name('transactions.index');
    Route::get('transactions/{code}/{status}','TransactionController@status');
    Route::get('transactions/{code}/detail/data','TransactionController@detail');
    Route::get('transactions/{code}/detail/data/cetak','TransactionController@cetakPDF');
    // Users Routes
    Route::get('user','UserController@index')->name('admin.user');
    // changeStatus
    Route::get('user/status/{id}','UserController@changeStatus');
    Route::get('user/add','UserController@create')->name('admin.user.create');
    Route::post('user/add','UserController@store')->name('admin.user.store');
    Route::get('user/edit/{id}','UserController@edit');
    Route::post('user/update','UserController@update');
    Route::get('user/delete/{id}', 'UserController@delete');


});
