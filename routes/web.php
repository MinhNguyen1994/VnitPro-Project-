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

Route::get('/' , 'User\UserController@index')->name('user.index'); 
Route::get('/logout', 'Auth\LoginController@userLogout')->name('logout');  

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
	    Route::get('/',['as' => 'index', 'uses' =>'LocationController@index']);

	    Route::get('/create' ,'LocationController@createGet')->name('location.create');
	    Route::post('/create','LocationController@createPost')->name('location.create.post');

	    Route::get('/edit/{id}'	,['as' =>'editGet'	,'uses' => 'LocationController@editGet']);
	    Route::post('/edit/{id}',['as' => 'editPost','uses'	=> 'LocationController@editPost']);

	    Route::get('/delete/{id}'	,['as' => 'delete'	,'uses' => 'LocationController@delete']);    
	});

	Route::group(['prefix' => 'product'],function()
	{
		Route::get('/'	,['as' =>'index'	,'uses' => 'Product\ProductController@index']);

		Route::get('/create',	['as' => 'createGet'	,'uses' => 'Product\ProductController@createGet']);
		Route::post('/create',	['as' => 'createPost'	,'uses' => 'Product\ProductController@createPost']);	

		Route::get('/edit/{id}'	,['as' =>'editGet'	,'uses' => 'Product\ProductController@editGet']);
		Route::post('/edit/{id}',['as' => 'editPost','uses'	=> 'Product\ProductController@editPost']);

		Route::get('/delete/{id}'	,['as' => 'delete'	,'uses' => 'Product\ProductController@delete']);

		Route::group(array('prefix' => 'quanlity'),function(){
			Route::get('/', ['as' => 'index' ,'uses' => 'Product\QuanlityController@index']);
		});

		Route::group(array('prefix' => 'group'),function(){
			Route::get('/',	['as' => 'indexGroup','uses' => 'Product\ProductGroupController@index']);

			Route::get('/create',	['as' => 'createGet'	,'uses' => 'Product\ProductGroupController@createGet']);
			Route::post('/create',	['as' => 'createPost'	,'uses' => 'Product\ProductGroupController@createPost']);

			Route::get('/edit/{id}'	,['as' =>'editGet'	,'uses' => 'Product\ProductGroupController@editGet']);
	    	Route::post('/edit/{id}',['as' => 'editPost','uses'	=> 'Product\ProductGroupController@editPost']);

			Route::get('/delete/{id}'	,['as' => 'delete'	,'uses' => 'Product\ProductGroupController@delete']);
		});
	});

	Route::get('/ajax-district','LocationController@getCodeCity');
	Route::get('/ajax-ward','LocationController@getCodeDistrict');

	Route::group(array('prefix' => 'history'),function()
	{
		Route::get('/bills',['as' => 'bills' ,'uses' => 'History\HistoryBillController@listBills']);	
	});
});

// -----------------------------------------END ADMIN-----------------------------------------\\







