<?php

use App\Events\api1Event;
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

Route::get('/page1', function () {
    return view('home.api1');
})->name('page1');

Route::get('/page2', function () {
    return view('home.api2');
})->name('page2');

Route::get('/log', function () {
    return view('auth.login');
})->name('login');
