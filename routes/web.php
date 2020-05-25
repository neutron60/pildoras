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

Route::get('/neutron', 'NeutronController@index');

Route::get('/', function () {
    return view('welcome');
});





Route::get('/home', 'HomeController@index')->name('home');

/* rutas del crud de advertising */
Route::get('/admin/article-detail/{id}', 'AdvertisingController@article_detail');
Route::get('/admin/article-list/{id}', 'AdvertisingController@article_list');
Route::resource('/admin/advertising', 'AdvertisingController');
/* rutas del crud de aside advertising */
Route::resource('/admin/aside-advertising', 'AsideAdvertisingController');
/* rutas del crud de user */
Route::get('/admin/user/search', 'UserController@search');
Route::resource('/admin/user', 'UserController');
/* rutas del crud de role */
Route::resource('/admin/role', 'RolController');
/* rutas del crud de department */
Route::get('/admin/main', 'DepartmentController@main');
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
