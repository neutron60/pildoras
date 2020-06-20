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
Route::post('/client/purchase/create-order', 'PurchaseController@create_order');

Route::post('/client/purchase/store-order-withdrawal', 'PurchaseController@store_order_withdrawal');
Route::post('/client/purchase/store-order-courier', 'PurchaseController@store_order_courier');
Route::post('/client/purchase/store-order-address', 'PurchaseController@store_order_address');

Route::get('/client/purchase/order-shipped', 'PurchaseController@order_shipped');




/********************************************************************* */
/*        VENDEDOR    */
/* rutas de purchase */

Route::get('/seller/purchase/search-order', 'PurchaseController@search_order');

Route::put('/seller/purchase/update-withdrawal-store/{id}', 'PurchaseController@update_withdrawal_store');
Route::put('/seller/purchase/update-sent-courier/{id}', 'PurchaseController@update_sent_courier');
Route::put('/seller/purchase/update-sent-address/{id}', 'PurchaseController@update_sent_address');
Route::put('/seller/purchase/update-sent-address-new/{id}', 'PurchaseController@update_sent_address_new');
Route::put('/seller/purchase/update-payment/{id}', 'PurchaseController@update_payment');
Route::put('/seller/purchase/update-verified-payment/{id}', 'PurchaseController@update_verified_payment');
Route::put('/seller/purchase/update-invoice/{id}', 'PurchaseController@update_invoice');

Route::resource('/seller/purchase', 'PurchaseController');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');





/********************************************************************* */
/*        ADMINISTRADOR    */
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



/*            */


Route::get('/role/2/prueba', function(){
    dd (Role::find(1)->user);
});

Auth::routes();
