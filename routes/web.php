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

Route::get('/', function () {
	$products = App\Product::paginate(4);
	$categories = App\Category::all();
	$cartItems = Cart::content();
    return view('welcome', compact('products','categories','cartItems'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware' => ['admin','auth']], function(){
Route::resource('/','AdminController');
Route::resource('/product','ProductController');
Route::resource('/category','CategoryController');
Route::get('/allOrders','OrdersController@allOrders')->name('allOrders');
Route::get('/pendingOrders','OrdersController@pendingOrders')->name('pendingOrders');
Route::get('/deliveredOrders','OrdersController@deliveredOrders')->name('deliveredOrders');
});

Route::get('/products','ProductController@allproducts')->name('allproducts');

Route::get('/category/{id}','CategoryController@showcategories')->name('showcategories');

Route::group(['middleware' => ['auth']], function(){
Route::get('/addToCart/{id}','CartController@addToCart')->name('addToCart');

Route::get('/cart','CartController@cartIndex')->name('cartIndex');

Route::match(['put','patch'],'/cart/{cart}','CartController@updateCart')->name('updateCart');

Route::delete('/cart/{id}','CartController@deleteItems')->name('deleteItems');

Route::get('/payment-method','PaymentController@paymentMethod')->name('paymentMethod');

Route::get('banktransfer','PaymentController@bankTransfer')->name('bankTransfer');

Route::post('/bankTransferSubmitOrder','PaymentController@bankTransferSubmitOrder')->name('bankTransferSubmitOrder');

Route::get('/paymentcard','PaymentController@paymentcard')->name('paymentcard');

Route::post('/paymentcardSubmitOrder','PaymentController@paymentcardSubmitOrder')->name('paymentcardSubmitOrder');

Route::get('/thanks','PaymentController@thanks')->name('thanks');

});

Route::post('/statusOrder/{id}','OrdersController@statusOrder')->name('statusOrder');