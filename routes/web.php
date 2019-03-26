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



Route::get('appointments', 'AppointmentsController@index')->name('appointments.index')->middleware('auth');
Route::get('appointments/create', 'AppointmentsController@create')->name('appointments.create')->middleware('auth');
Route::get('appointments/list', 'AppointmentsController@list')->name('appointments.list')->middleware('auth');
Route::post('appointments', 'AppointmentsController@store')->name('appointments.store')->middleware('auth');
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
