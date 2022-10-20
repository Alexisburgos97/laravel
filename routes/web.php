<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource('/devices', 'DeviceController');
    Route::resource('/customers', 'CustomerController');
    Route::resource('/technicians', 'TechnicianController')->middleware('admin');

    Route::get('/maintenances', 'MaintenancesController@index')->name('maintenances.index');
    Route::get('/maintenances/create', 'MaintenancesController@create')->name('maintenances.create');
    Route::post('/maintenances/store', 'MaintenancesController@store')->name('maintenances.store');
    Route::get('/maintenances/edit/{id}', 'MaintenancesController@edit')->name('maintenances.edit');
    Route::put('/maintenances/update/{id}', 'MaintenancesController@update')->name('maintenances.update');
    Route::delete('/maintenances/delete/{id}', 'MaintenancesController@destroy')->name('maintenances.destroy');

    Route::get('/profile', 'ProfileController@index')->name('profile.index');

    Route::get('/profile/edit-personal', 'ProfileController@editPersonalData')
        ->name('profile.edit_personal_data')->middleware('password.confirm');
    Route::get('/profile/edit-password', 'ProfileController@editPassword')
        ->name('profile.edit_password')->middleware('password.confirm');

    Route::put('/profile/update-personal', 'ProfileController@updatePersonalData')->name('profile.update_personal_data');
    Route::put('/profile/update-password', 'ProfileController@updatePassword')->name('profile.update_password');

});






