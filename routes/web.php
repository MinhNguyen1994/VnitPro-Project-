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

Route::get('/', 'HomeController@index')->name('home');
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/import', ['as' => 'import'		,'uses' => 'ExcelController@getImport']);
Route::post('/import',['as' => 'importPost'	,'uses' => 'ExcelController@postImport']);

Route::group(array('prefix' => 'location'), function()
{
    Route::get('/',['as' => 'index', 'uses' =>'LocationController@index']);

    Route::get('/create'	,['as' => 'createGet'	,'uses' => 'LocationController@createGet']);
    Route::post('/create'	,['as' => 'createPost'	,'uses' => 'LocationController@createPost']);

    Route::get('/edit/{id}'	,['as' =>'editGet'	,'uses' => 'LocationController@editGet']);
    Route::post('/edit/{id}',['as' => 'editPost','uses'	=> 'LocationController@editPost']);

    Route::get('/delete/{id}'	,['as' => 'delete'	,'uses' => 'LocationController@delete']);    
});

Route::group(array('prefix' => 'product'),function()
{
	Route::get('/'	,['as' =>'index'	,'uses' => 'ProductController@index']);

	Route::group(array('prefix' => 'group'),function(){
		Route::get('/',	['as' => 'indexGroup','uses' => 'Product\ProductGroupController@index']);

		Route::get('/create',	['as' => 'createGet'	,'uses' => 'Product\ProductGroupController@createGet']);
		Route::post('/create',	['as' => 'createPost'	,'uses' => 'Product\ProductGroupController@createPost']);

		Route::get('/edit/{id}'	,['as' =>'editGet'	,'uses' => 'Product\ProductGroupController@editGet']);
    	Route::post('/edit/{id}',['as' => 'editPost','uses'	=> 'Product\ProductGroupController@ditPost']);

		Route::get('/delete/{id}'	,['as' => 'delete'	,'uses' => 'Product\ProductGroupController@delete']);
	});
});



Route:: get('/ajax-district','LocationController@getCodeCity');
Route:: get('/ajax-ward','LocationController@getCodeDistrict');





