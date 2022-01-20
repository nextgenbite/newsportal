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

Route::get('/', 'FrontController@index');

Route::get('category/{slug}','FrontController@category');

Route::get('post/{slug}', 'FrontController@post');
Route::get('page/{slug}', 'FrontController@page');
Route::get('contact-us', 'FrontController@ContactUs');
Route::post('contact-us/store', 'FrontController@sendMsg');


Route::get('search-content', 'FrontController@searchContent');





Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
Route::get('logout', 'HomeController@logout');

Route::group(['middleware' => ['auth']], function(){
//setting
Route::post('admin/settings/store', 'AdminController@SettingStore');
Route::patch('admin/settings/update', 'AdminController@SettingUpdate');
Route::resource('admin/settings', 'adminSettingController');
// category
Route::resource('admin/category', 'CategoriesController');
Route::resource('admin/posts', 'adminPostsController');
Route::resource('admin/pages', 'adminPagesController');
Route::resource('admin/message', 'adminmsgController');
Route::resource('admin/advertisement', 'adminAdvController');

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');


});

