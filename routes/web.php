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

Route::get('/', 'FrontendController@index')->name('welcome');
Route::get('/product/{slug}', 'FrontendController@show')->name('single-product');
Route::post('/contact', 'FrontendController@contactStore')->name('store-contact');
Route::get('/contact', 'FrontendController@contact')->name('contact-us');

Auth::routes();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('admin/slides', 'Admin\SlideController');
	Route::resource('admin/categories', 'Admin\CategoryController');
	Route::resource('admin/products', 'Admin\ProductController');
	Route::resource('admin/system-settings', 'Admin\SystemSettingsController');
});
