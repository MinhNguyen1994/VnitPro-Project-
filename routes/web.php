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

    Route::get('/create','LocationController@createGet');
    Route::post('/create','LocationController@createPost');
    
});
Route:: get('/ajax-district','LocationController@getCodeCity');





