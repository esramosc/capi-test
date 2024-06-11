<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Solutions\ReportSolution;

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
Route::get('contacts/show/{id}', [ContactsController::class, 'show']);

Route::post('phones', [PhoneController::class, 'store']);
Route::put('phones/update/{id}', [PhoneController::class, 'update']);
Route::delete('phones/delete/{id}', [PhoneController::class, 'destroy']);

Route::post('emails', [EmailController::class, 'store']);
Route::put('emails/update/{id}', [EmailController::class, 'update']);
Route::delete('emails/delete/{id}', [EmailController::class, 'destroy']);

Route::post('addresses', [AddressController::class, 'store']);
Route::put('addresses/update/{id}', [AddressController::class, 'update']);
Route::delete('addresses/delete/{id}', [AddressController::class, 'destroy']);

Route::get('report', [ReportController::class, 'contactsByFilter']);
