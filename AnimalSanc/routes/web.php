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

Route::get('about', 'PagesController@getAbout')->name('Pages.about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('pet', 'PetController');

Route::get('/', function(){
	return redirect()->route('pet.index');
});

