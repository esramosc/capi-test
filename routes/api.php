<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PhoneController;
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

Route::resource('contacts', ContactsController::class);

Route::post('phones', [PhoneController::class, 'store']);
Route::post('phones/update/{id}', [PhoneController::class, 'update']);

Route::post('emails', [EmailController::class, 'store']);
Route::post('emails/update/{id}', [EmailController::class, 'update']);

Route::post('addresses', [AddressController::class, 'store']);
Route::post('addresses/update/{id}', [AddressController::class, 'update']);
