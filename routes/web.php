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

Route::get('/', 'HomeController@index');
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/import', ['as' => 'import','uses' => 'ExcelController@getImport']);
Route::post('/import', 'ExcelController@postImport');

Route::group(array('prefix' => 'location'), function()
{
    Route::get('/', 'LocationController@index');

    Route::get('/create', ['as' => 'createGet','uses' => 'LocationController@createGet']);
    Route::post('/create',['as' => 'createPost','uses' => 'LocationController@createPost']);

    Route::get('/edit/{id}',['as' =>'editGet','uses' => 'LocationController@editGet']);
    Route::post('/edit/{id}',['as' => 'editPost','uses'=>'LocationController@editPost']);

    Route::get('/delete/{id}',['as' => 'delete','uses' =>'LocationController@delete']);
    
});
Route:: get('/ajax-district','LocationController@getCodeCity');
Route:: get('/ajax-ward','LocationController@getCodeDistrict');





