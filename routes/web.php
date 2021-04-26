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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//SocialNetwork
Route::get('/admin/socialnetwork', 'Admin\SocialNetworkController@index')->name('admin.socialnetwork.index');
Route::get('/admin/socialnetwork/create', 'Admin\SocialNetworkController@create')->name('admin.socialnetwork.create');

//UserTypes
Route::get('/admin/userstype', 'Admin\UserTypeController@index')->name('admin.usertype.index');
Route::get('/admin/userstype/create', 'Admin\UserTypeController@create')->name('admin.usertype.create');

//Category
Route::get('/admin/categories', 'Admin\CategoryController@index')->name('admin.categories.index');
Route::get('/admin/categories/create', 'Admin\CategoryController@create')->name('admin.categories.create');

