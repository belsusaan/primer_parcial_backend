<?php

use Illuminate\Http\Request;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', [BookController::class, 'index']);
Route::post('/loans', [LoanController::class, 'store']);
Route::post('/returns/{loan_id}', [LoanController::class, 'return']);

// Punto extra: historial de préstamos con relaciones Eloquent
Route::get('/loans', [LoanController::class, 'history']);
