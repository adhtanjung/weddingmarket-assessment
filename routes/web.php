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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view("dashboard");
    })->name('dashboard');
    Route::get('/admin', 'App\Http\Controllers\HomeController@render')->name('admin');
    Route::get('/pdf', 'App\Http\Controllers\HomeController@pdf')->name('pdf');
});
// Route::middleware('App\Http\Controllers\HomeController@index')->get('/admin', function () {
//     return view('admin');
// })->name('admin');
// Route::get('redirect', 'App\Http\Controllers\HomeController@index')->name('redirect');