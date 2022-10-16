<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/devices', 'DeviceController');

Route::resource('/customers', 'CustomerController');

Route::get('/maintenances', 'MaintenancesController@index')->name('maintenances.index');
Route::get('/maintenances/create', 'MaintenancesController@create')->name('maintenances.create');
Route::post('/maintenances/store', 'MaintenancesController@store')->name('maintenances.store');
Route::get('/maintenances/edit/{id}', 'MaintenancesController@edit')->name('maintenances.edit');
Route::put('/maintenances/update/{id}', 'MaintenancesController@update')->name('maintenances.update');;
Route::delete('/maintenances/delete/{id}', 'MaintenancesController@destroy')->name('maintenances.destroy');;

Route::resource('technicians', 'TechnicianController');




