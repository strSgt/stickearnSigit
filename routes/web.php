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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/save-form', 'HomeController@store');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/Jawaban/{biodata}', 'JawabanController@show');
Route::get('/finish', 'HomeController@index');
Route::get('/admin', 'AdminHomeController@index')->name('adminpage');
Route::get('/admin/{row}', 'AdminHomeController@show');
Route::patch('/admin/{query}', 'AdminHomeController@update');
Route::get('/admin/{row}', 'AdminHomeController@show');
Route::get('/admin_hapus/{query}', 'AdminHomeController@delete');
// Route::get('/admin', function(){
//     return view('admin');
// })->name('adminpage');
Route::get('admin-login','Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as' => 'admin-login', 'uses' => 'Auth\AdminLoginController@login']);
Route::get('admin-register','Auth\AdminLoginController@showRegisterPage');
Route::post('admin-register', 'Auth\AdminLoginController@register')->name('admin.register');