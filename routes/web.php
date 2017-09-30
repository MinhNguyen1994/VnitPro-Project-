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

Route::post('/getDataFromID','ExcelController@getDataFromID');

Route::get('/importCity', ['as' => 'import','uses' => 'ExcelController@getImport']);
Route::post('/importCity',['as' => 'importCity', 'uses' =>'ExcelController@postImportCity']);

Route::get('/importDistrict',['as' => 'importDistrict','uses' => 'ExcelController@getImport']);
Route::post('/importDistrict',['as' => 'importDistrict','uses' => 'ExcelController@postImportDistrict']);

Route::get('/importWard',['as' => 'importWard','uses' => 'ExcelController@getImport']);
Route::post('/importWard',['as' => 'importWard','uses' => 'ExcelController@postImportWard']);





