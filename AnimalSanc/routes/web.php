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
    return view('welcome');
});

Route::resource('users','UserController');

Auth::routes();
Route::get('/logout', 'HomeController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Pets', 'HomeController@pets');

Route::get('/admin', 'HomeController@admin');

Route::group(['prefix' => 'allPets'], function () {
    Route::get('/', 'PetController@index');
    Route::match(['get', 'post'], 'create', 'PetController@create');
    Route::match(['get', 'put'], 'update/{id}', 'PetController@update');
    Route::delete('delete/{id}', 'PetController@destroy');
});

Route::resource('pet_adopts', 'PetAdoptController');
//Route::get('admin/routes', 'HomeController@admin')->middleware('admin');



