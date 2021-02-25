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

Route::resource('/eventpage','EventsController');
//Route::get('addeventurl','EventController@create')->name('EventController.store');
Route::get('addeventurl','EventsController@display')->name('EventsController.store');
Route::post('addeventurl/store','EventsController@store')->name('addevent.store');
