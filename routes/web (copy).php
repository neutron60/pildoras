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


/********************************************************************* */
/*        LIBRES    */
/* rutas de neutron */
Route::get('/neutron', 'NeutronController@index');
Route::get('/neutron/article-detail/{id}', 'NeutronController@article_detail');
Route::get('/neutron/article-list-department/{id}', 'NeutronController@article_list_department');
Route::get('/neutron/article-list-section/{id}', 'NeutronController@article_list_section');
Route::get('/neutron/article-list-category/{id}', 'NeutronController@article_list_category');



/********************************************************************* */
/*        CLIENTE    */
/* rutas de purchase */
Route::post('/client/purchase/create-purchase', 'PurchaseClientController@create_purchase');
Route::get('/client/purchase/create-order/{purchased_amount}/{purchased_item}', 'PurchaseClientController@create_order');


Route::post('/client/purchase/store-order', 'PurchaseClientController@store_order');

Route::get('/client/purchase/order-shipped', 'PurchaseClientController@order_shipped');

Route::get('/client/purchase/show-my-purchase/{id}', 'PurchaseController@show_my_purchase');
Route::get('/client/purchase/index-my-purchases', 'PurchaseController@index_my_purchases');
Route::get('/client/purchase/index-search-my-purchases', 'PurchaseController@index_search_my_purchases');
Route::get('/client/purchase/show-my-orders/{id}', 'PurchaseController@show_my_orders');
Route::get('/client/purchase/index-my-orders', 'PurchaseController@index_my_orders');


Route::get('/client/user/edit-user-id-number', 'UserController@edit_user_id_number');
Route::get('/client/user/edit-user-phone', 'UserController@edit_user_phone');
Route::get('/client/user/edit-user-address', 'UserController@edit_user_address');

Route::put('/client/user/update-user-id-number/{id}', 'UserController@update_user_id_number');
Route::put('/client/user/update-user-phone/{id}', 'UserController@update_user_phone');
Route::put('/client/user/update-user-address/{id}', 'UserController@update_user_address');

Route::get('/client/user/show-user', 'UserController@show_user');






/********************************************************************* */
/*        VENDEDOR    */
/* rutas de purchase */

Route::get('/seller/purchase/index-search-order-requested', 'PurchaseController@index_search_order_requested');
Route::get('/seller/purchase/index-search-sales', 'PurchaseController@index_search_sales');

Route::put('/seller/purchase/update-order-requested/{id}', 'PurchaseController@update_order_requested');
Route::put('/seller/purchase/update-order-payment-details/{id}', 'PurchaseController@update_order_payment_details');
Route::put('/seller/purchase/update-order-verified-payment/{id}', 'PurchaseController@update_order_verified_payment');
Route::put('/seller/purchase/update-order-assign-invoice/{id}', 'PurchaseController@update_order_assign_invoice');

Route::get('/seller/purchase/index-order-requested', 'PurchaseController@index_order_requested')->name('index_order_requested');
Route::get('/seller/purchase/index-order-verified-payment', 'PurchaseController@index_order_verified_payment');
Route::get('/seller/purchase/index-order-assign-invoice', 'PurchaseController@index_order_assign_invoice');
Route::get('/seller/purchase/index-sales', 'PurchaseController@index_sales');

Route::get('/seller/purchase/edit-order-requested/{id}', 'PurchaseController@edit_order_requested');
Route::get('/seller/purchase/edit-order-payment-details/{id}', 'PurchaseController@edit_order_payment_details');
Route::get('/seller/purchase/edit-order-verified-payment/{id}', 'PurchaseController@edit_order_verified_payment');
Route::get('/seller/purchase/edit-order-assign-invoice/{id}', 'PurchaseController@edit_order_assign_invoice');

Route::get('/seller/purchase/show-order-requested/{id}', 'PurchaseController@show_order_requested');
Route::get('/seller/purchase/show-sales-detail/{id}', 'PurchaseController@show_sales_detail');


Route::resource('/seller/purchase', 'PurchaseController');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');





/********************************************************************* */
/*        ADMINISTRADOR    */

Route::middleware('auth')->group(function(){
/* rutas del crud de advertising */
Route::get('/admin/article-detail/{id}', 'AdvertisingController@article_detail');
Route::get('/admin/article-list-department/{id}', 'AdvertisingController@article_list_department');
Route::get('/admin/article-list-section/{id}', 'AdvertisingController@article_list_section');
Route::get('/admin/article-list-category/{id}', 'AdvertisingController@article_list_category');
Route::resource('/admin/advertising', 'AdvertisingController');


/* rutas del crud de aside advertising */
Route::resource('/admin/aside-advertising', 'AsideAdvertisingController');

/* rutas del crud de user */
Route::get('/admin/user/search', 'UserController@search');
Route::resource('/admin/user', 'UserController');

/* rutas del crud de role */
Route::resource('/admin/role', 'RolController');

/* rutas del crud de department */
Route::resource('/admin/department', 'DepartmentController');
/* rutas del route de section  */

Route::get('/admin/section/search', 'SectionController@search');
Route::resource('/admin/section', 'SectionController');

/* rutas del route de category  */
Route::get('/admin/category/search', 'CategoryController@search');
Route::get('/admin/category/select-department', 'CategoryController@selectDepartment');
Route::get('/admin/category/create1/{id}', 'CategoryController@create');
Route::resource('/admin/category', 'CategoryController');

/* rutas del crud de article   */
Route::get('/admin/article/search', 'ArticleController@search');
Route::get('/admin/article/select-department', 'ArticleController@selectDepartment');
Route::get('/admin/article/select-section/{id}', 'ArticleController@selectSection');
Route::get('/admin/article/create1/{id}', 'ArticleController@create');
Route::resource('/admin/article', 'ArticleController');
});

/*-------------------------*/






Auth::routes();
