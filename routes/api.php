<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MortgageController;
use App\Http\Controllers\ShowMortgageController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('admin')->group(function () {
    Route::apiResource('mortgages', MortgageController::class);
});

Route::prefix('public')->group(function () {
    Route::get('mortgages', [ShowMortgageController::class, 'index']);
    Route::get('mortgages/{mortgage}', [ShowMortgageController::class, 'show']);
});
