<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\MaintenancesController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [HomeController::class, 'index'] )->name('home');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource('/devices', DeviceController::class);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/technicians', TechnicianController::class)->middleware('admin');

    Route::get('/maintenances', [MaintenancesController::class, 'index'])->name('maintenances.index');
    Route::get('/maintenances/create', [MaintenancesController::class, 'create'])->name('maintenances.create');
    Route::post('/maintenances/store', [MaintenancesController::class, 'store'])->name('maintenances.store');
    Route::get('/maintenances/edit/{id}', [MaintenancesController::class, 'edit'])->name('maintenances.edit');
    Route::put('/maintenances/update/{id}', [MaintenancesController::class, 'update'])->name('maintenances.update');
    Route::delete('/maintenances/delete/{id}', [MaintenancesController::class, 'destroy'])->name('maintenances.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/profile/edit-personal', [ProfileController::class, 'editPersonalData'])
        ->name('profile.edit_personal_data')->middleware('password.confirm');
    Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])
        ->name('profile.edit_password')->middleware('password.confirm');

    Route::put('/profile/update-personal', [ProfileController::class, 'updatePersonalData'])->name('profile.update_personal_data');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update_password');

});






