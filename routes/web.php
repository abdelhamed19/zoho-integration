<?php

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
    return view('welcome');
});



// http://localhost/callback?state=testing&code=1000.293326b19e985894c63cf288c7c3e402.3c76c9bf77582c14085aa232e20c67d4&location=us&accounts-server=https%3A%2F%2Faccounts.zoho.com&
