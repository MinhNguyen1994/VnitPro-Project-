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

Route::get('/', function () {
    return view('loginAdmin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/importCity', ['as' => 'importCity','uses' => 'ExcelController@getImport']);
Route::post('/importCity', ['as' =>'importCity','uses' => 'ExcelController@postImportCity']);

Route::get('/importDistrict',['as' => 'importDistrict', 'uses' =>'ExcelController@getImport']);
Route::post('/importDistrict',['as' => 'importDistrict','uses' => 'ExcelController@postImportDistrict']);





