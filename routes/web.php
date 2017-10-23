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
Auth::routes();
// -----------------------------------------USER-----------------------------------------\\

Route::get('/' ,'User\UserController@history')->name('user.index');
Route::get('/home' ,'User\UserController@index')->name('user.index');

Route::get('/import','User\UserController@actionImport')->name('user.import.product');
Route::post('/import','User\UserController@postImport')->name('user.import.product.post');

Route::get('/export','User\UserController@actionExport')->name('user.export.product');

Route::get('/view','User\UserController@listWH')->name('user.view.listWH');
Route::get('/ajax-getProduct','User\UserController@getAjaxProduct')->name('user.ajax.get.product');

Route::get('history','User\UserController@history')->name('user.history');
  
Route::get('/logout', 'Auth\LoginController@userLogout')->name('logout');

Route::get('/getProduct','User\UserController@getProduct')->name('get.product');

Route::get('/getProductRes','User\UserController@getProductRes')->name('get.product.res');

Route::get('/getQuanlity','User\UserController@getQuanlity')->name('get.product.quanlity');

Route::get('/getProductExport','User\UserController@getProductExport')->name('get.product.export');


// -----------------------------------------END USER-----------------------------------------\\





// -----------------------------------------ADMIN-----------------------------------------\\

Route::group(['prefix' => 'admin'],function(){

	Route::get('/', 'Admin\AdminController@home')->name('admin.index');	

	Route::get('/login','Admin\AdminLoginController@showLoginForm')->name('admin.login.form');
	Route::post('/login','Admin\AdminLoginController@login')->name('admin.login');
	Route::post('/logout','Admin\AdminLoginController@logout')->name('admin.logout');

	Route::get('/import' , 'ExcelController@getImport')->name('import.excel');
	Route::post('/import', 'ExcelController@postImport')->name('import.excel.post');

	Route::group(['prefix' => 'location'], function()
	{
	    Route::get('/','LocationController@index')->name('location');

	    Route::get('/create' ,'LocationController@createGet')->name('location.create');
	    Route::post('/create','LocationController@createPost')->name('location.create.post');

	    Route::get('/edit/{id}'	,'LocationController@editGet')->name('location.edit');
	    Route::post('/edit/{id}','LocationController@editPost')->name('location.edit.post');

	    Route::get('/delete/{id}','LocationController@delete')->name('location.delete');    
	});

	Route::group(['prefix' => 'product'],function()
	{
		Route::get('/','Product\ProductController@index')->name('product');

		Route::get('/create','Product\ProductController@createGet')->name('product.create');
		Route::post('/create','Product\ProductController@createPost')->name('product.create.post');	

		Route::get('/edit/{id}'	,'Product\ProductController@editGet')->name('product.edit');
		Route::post('/edit/{id}','Product\ProductController@editPost')->name('product.edit.post');

		Route::get('/delete/{id}','Product\ProductController@delete')->name('product.delete');

		Route::group(['prefix' => 'quanlity'],function(){
			Route::get('/','Product\QuanlityController@index')->name('product.quanlity');
		});

		Route::group(array('prefix' => 'group'),function(){
			Route::get('/','Product\ProductGroupController@index')->name('product.group');

			Route::get('/create','Product\ProductGroupController@createGet')->name('product.group.create');
			Route::post('/create','Product\ProductGroupController@createPost')->name('product.group.create.post');

			Route::get('/edit/{id}','Product\ProductGroupController@editGet')->name('product.group.edit');
	    	Route::post('/edit/{id}','Product\ProductGroupController@editPost')->name('product.group.edit.post');

			Route::get('/delete/{id}','Product\ProductGroupController@delete')->name('product.group.delete');
		});

		Route::get('/unit','Product\ProductController@createUnit')->name('product.unit.create');
	});

	Route::get('/ajax-district','LocationController@getCodeCity')->name('ajax.get.city');
	Route::get('/ajax-ward','LocationController@getCodeDistrict')->name('ajax.get.district');

	Route::group(['prefix' => 'history'],function()
	{
		Route::get('/bills','History\HistoryBillController@listBills')->name('history.bills');

	});
});

// -----------------------------------------END ADMIN-----------------------------------------\\







