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
    return view('template');
});

Route::get('/doctors/create', 'App\Http\Controllers\DoctorController@create'); // /doctors/create -  to ścieżka, DoctorController to kontroler i @nazwafunkcji
Route::get('/doctors/edit/{id}', 'App\Http\Controllers\DoctorController@edit');
Route::post('/doctors/edit', 'App\Http\Controllers\DoctorController@editStore');
Route::get('/doctors', 'App\Http\Controllers\DoctorController@index');
Route::get('/doctors/delete/{id}', 'App\Http\Controllers\DoctorController@delete');
Route::get('/doctors/specializations/{id}', 'App\Http\Controllers\DoctorController@listBySpecialization');
Route::post('/doctors', 'App\Http\Controllers\DoctorController@store');
Route::get('/doctors/{id}', 'App\Http\Controllers\DoctorController@show');

Route::get('/specializations', 'App\Http\Controllers\SpecializationController@index');
Route::get('/specializations/create', 'App\Http\Controllers\SpecializationController@create');
Route::post('/specializations', 'App\Http\Controllers\SpecializationController@store');

Route::get('/visits', 'App\Http\Controllers\VisitController@index');
Route::get('/visits/create', 'App\Http\Controllers\VisitController@create');
Route::post('/visits', 'App\Http\Controllers\VisitController@store');

Route::get('/patients', 'App\Http\Controllers\PatientController@index');

Route::get('/patients/create', 'App\Http\Controllers\PatientController@create')->middleware('auth');
Route::post('/patients', 'App\Http\Controllers\PatientController@store');
Route::get('/patients/{id}', 'App\Http\Controllers\PatientController@show')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
