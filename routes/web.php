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

Route::get('/', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@store')->name('login.store');
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@store')->name('register.store');
Route::post('check-email-id','RegisterController@update');

 // Google Login
Route::get('/google', 'GoogleController@redirectToProvider')->name('google');
Route::get('/google/callback', 'GoogleController@handleProviderCallback')->name('google.callback');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/logout','LoginController@destroy')->name('logout');
});
