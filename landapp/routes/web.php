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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('Search', 'SearchController@search');
Route::get('update', 'HomeController@updateredir');
Route::post('Updatedb', 'UpdateController@update');
Route::post('selected', 'HomeController@selected');
Route::post('InsertAll', 'InsertAllController@store');
Route::get('details', 'HomeController@details');
Route::get('delete', 'HomeController@delete');
