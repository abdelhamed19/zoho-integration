<?php

use App\Http\Controllers\ZohoInvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/organization',[ZohoInvoiceController::class,'getOrganizationId']);
Route::get('invoices',[ZohoInvoiceController::class,'getAllInvoices']);
Route::post('invoice',[ZohoInvoiceController::class,'createInvoice']);
Route::put('invoice/{id}',[ZohoInvoiceController::class,'updateInvoice']);
Route::get('invoice/{id}',[ZohoInvoiceController::class,'getInvoice']);

