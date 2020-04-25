<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Role;

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
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

/* rutas del crud de user */
Route::resource('/admin/cruduser', 'UserController');

/*            */

/* rutas del crud de department */
Route::get('/admin/main/', 'DepartmentController@main');
Route::resource('/admin/department', 'DepartmentController');
Route::resource('/admin/section', 'SectionController');


/*            */


Route::get('/role/2/prueba', function(){
    dd (Role::find(1)->user);
});


