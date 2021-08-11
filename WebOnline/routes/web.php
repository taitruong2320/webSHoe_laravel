<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('page.home');
});



Auth::routes();





Route::group(['prefix'=>'home'],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['prefix'=>'contact'],function(){
        Route::get('/','contactController@contact')->name('contact');
    });
});
Route::group(['prefix'=>'cart'],function(){
    Route::get('/','cartController@cart')->name('cart');
});



Route::group(['prefix'=>'shop'],function(){
    Route::get('/', 'shopController@shop')->name('shop');
    Route::post('search={key}','shopController@search');
    Route::get('search={key}','shopController@search');
    Route::group(['prefix'=>'shopsingle'],function(){
        Route::get('/{id}','shopsingleController@shopsingle')->name('shopsingle');
    });
});


Route::get('/AddCart/{id}','cartController@addCart')->name('AddCart');
Route::get('/Delete-Item-Cart/{id}','cartController@DeleteItemCart');
Route::get('/List-Carts','cartController@ViewListCart');
Route::get('/Delete-Item-List-Cart/{id}','cartController@DeleteListItemCart');
Route::get('/Save-Item-List-Cart/{id}/{quanty}','cartController@SaveListItemCart');   
route::get('nhomSP','shopController@nhomSP')->name('nhomSP');
route::get('loaisanpham/{type}','shopController@loaisanpham')->name('loaisanpham');





Route::get('/logout','HomeController@logout')->name('logout');


Route::get('/admin','adminController@admin')->name('admin');
//Sản phẩm
Route::post('sanpham' , 'sanphamController@add');
Route::post('sanpham/edit/{id}','sanphamController@edit');
Route::post('sanpham/update/{id}','sanphamController@update');
Route::post('sanpham/delete/{id}','sanphamController@delete');
Route::group(['prefix'=>'sanpham'],function(){
    Route::get('/','sanphamController@get');
    Route::post('search={key}','sanphamController@search');
    Route::get('search={key}','sanphamController@search');
});







//Nhân viên
Route::post('nhanvien','nhanvienController@add');
Route::post('nhanvien/edit/{id}','nhanvienController@edit');
Route::post('nhanvien/update/{id}','nhanvienController@update');
Route::post('nhanvien/delete/{id}','nhanvienController@delete');
Route::group(['prefix'=>'nhanvien'],function(){
    Route::get('/','nhanvienController@get');
    Route::post('search={key}','nhanvienController@search');
    Route::get('search={key}','nhanvienController@search');
});

//img
// Route::get('/img','ImgController@sanpham')->name('img');
Route::group(['prefix'=>'img'],function(){
    Route::get('/','ImgController@get');
    
});
Route::post('img','ImgController@add');



Route::get('/dathang', 'cartController@getcheckout')->name('dathang')->middleware('auth');

Route::post('/dathang1', 'cartController@postcheckout')->name('dathang1');





Route::get('/tongquan','orderController@viewtongquan')->name('tongquan');
//order
    Route::get('/manager_order','orderController@managerorder');
    Route::get('/view-order/{id_bill}','orderController@view_order');
    



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});