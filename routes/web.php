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

Route::get('/gmah/category/{slug?}', 'GmahController@category')->name('category');
Route::get('/gmah/article/{slug?}', 'GmahController@article')->name('article');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
  Route::get('/', 'DashboardController@dashboard')->name('admin.index');
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
  Route::resource('/article', 'ArticleController', ['as'=>'admin']);
  Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment'], function() {
  	Route::resource('/user', 'UserController', ['as' => 'admin.user_managment']);
  });
});


Route::group(['prefix'=>'user', 'namespace'=>'User', 'middleware'=>['auth']], function(){
  Route::get('/', 'DashboardController@dashboard')->name('user.index');
  Route::resource('/category', 'CategoryController', ['as'=>'user']);
  Route::resource('/article',  'ArticleController',  ['as'=>'user']);
  Route::get('/createdonation', 'ArticleController@createDonation')->name('create.donation');
  Route::resource('/donationfrom', 'DonationFromController', ['as'=>'user']);
  Route::resource('/donationto', 'DonationToController', ['as'=>'user']);
});


Route::get('/', function () {
    return view('gmah.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
