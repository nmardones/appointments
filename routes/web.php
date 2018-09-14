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
    return redirect('/appointment');
});

Route::get('appointment', 'AppointmentController@index')->name('appointment.index');
Route::get('appointment/create', 'AppointmentController@create')->name('appointment.create');
Route::post('appointment/store', 'AppointmentController@store')->name('appointment.store');
Route::get('appointment/edit/{id}', 'AppointmentController@edit')->name('appointment.edit');
Route::PUT('appointment/update/{id}', 'AppointmentController@update')->name('appointment.update');

