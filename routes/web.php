<?php

use App\Http\Controllers\MortgageViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});



Route::get('/mortgages', function () {
    return view('mortgages.index');
})->name('index');

Route::get('/admin/mortgages', function () {
    return view('admin.index');
})->name('admin');