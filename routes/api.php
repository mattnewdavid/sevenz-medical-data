<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/tests', [LabController::class, 'index']);
Route::middleware('auth:sanctum')->post('/tests', [LabController::class, 'store']);