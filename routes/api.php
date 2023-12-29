<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShipmentController;

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

// Auth actions
Route::post('/auth/register', [AuthController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/transactions/quote_delivery', [TransactionsController::class, 'createQuote']);
    Route::post('/transactions/create_link/{lang}/{customer_uuid}', [TransactionsController::class, 'createQuoteLink']);
    Route::get('/quote/{customer_uuid}/{access_token}', [QuoteController::class, 'getQuote'])->name('quote');
    Route::post('/shipment/create', [ShipmentController::class, 'createShipment']);
    Route::put('/shipment/update/{id}', [ShipmentController::class, 'updateShipment']);
});

// Get user
Route::get('/user/{uuid}', [UserController::class, 'getUser']);
