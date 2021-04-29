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

//Route::get('/estados','EstadosController@index');

//Route::get('/estados/create','EstadosController@create');

Route::resource('estados', 'EstadosController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//SocialNetwork
Route::get('/admin/socialnetwork', 'Admin\SocialNetworkController@index')->name('admin.socialnetwork.index');
Route::get('/admin/socialnetwork/create', 'Admin\SocialNetworkController@create')->name('admin.socialnetwork.create');
Route::post('/admin/socialnetwork/store', 'Admin\SocialNetworkController@store')->name('admin.socialnetwork.store');
Route::post('/admin/socialnetwork/{socialnetworkId}/update', 'Admin\SocialNetworkController@update')->name('admin.socialnetwork.update');
Route::delete('/admin/socialnetwork/{socialnetworkId}/delete', 'Admin\SocialNetworkController@delete')->name('admin.socialnetwork.delete');

//UserTypes
Route::get('/admin/userstype', 'Admin\UserTypeController@index')->name('admin.usertype.index');
Route::get('/admin/userstype/create', 'Admin\UserTypeController@create')->name('admin.usertype.create');
Route::post('/admin/userstype/store', 'Admin\UserTypeController@store')->name('admin.usertype.store');
Route::post('/admin/userstype/{categoryId}/update', 'Admin\UserTypeController@update')->name('admin.usertype.update');
Route::delete('/admin/userstype/{categoryId}/delete', 'Admin\UserTypeController@delete')->name('admin.usertype.delete');

//Category
Route::get('/admin/categories', 'Admin\CategoryController@index')->name('admin.categories.index');
Route::post('/admin/categories/create', 'Admin\CategoryController@create')->name('admin.categories.create');
Route::post('/admin/categories/store', 'Admin\CategoryController@store')->name('admin.categories.store');
Route::post('/admin/categories/{categoryId}/update', 'Admin\CategoryController@update')->name('admin.categories.update');
Route::delete('/admin/categories/{categoryId}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');

//CategoriesProduct
Route::get('/admin/categoriesProducts/{module}', 'Admin\CategoryProductController@index')->name('admin.categoriesProducts.index');
Route::post('/admin/categoryProduct/create', 'Admin\CategoryProductController@create');
Route::get('/admin/categoryProduct/{id}/edit', 'Admin\CategoryProductController@getEdit')->name('admin.categoriesProducts.edit');
Route::post('/admin/categoryProduct/{id}/edit', 'Admin\CategoryProductController@postEdit');
Route::get('/admin/categoryProduct/{id}/delete', 'Admin\CategoryProductController@delete')->name('category_delete'); 

//Products
Route::get('/admin/productos','Admin\ProductController@index')->name('admin.productos.index');
Route::get('/admin/producto/create', 'Admin\ProductController@create')->name('admin.productos.create');
Route::post('/admin/producto/create','Admin\ProductController@postcreate')->name('admin.productos.create');

Route::get('/admin/producto/{id}/edit','Admin\ProductController@getEdit')->name('product_edit');
Route::post('/admin/producto/{id}/edit','Admin\ProductController@postEdit')->name('product_edit');
Route::get('/admin/producto/{id}/delete', 'Admin\ProductController@delete')->name('product_delete'); 

Route::post('/admin/producto/{id}/gallery/create','Admin\ProductController@postProductGalleryCreate')->name('product_gallery_add');
Route::get('/admin/producto/{id}/gallery/{gid}/delete','Admin\ProductController@getProductGalleryDelete')->name('product_gallery_delete');

