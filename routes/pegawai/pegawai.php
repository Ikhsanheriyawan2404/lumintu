<?php

use App\Http\Controllers\CostController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::controller(PegawaiController::class)->prefix('pegawai')->group(function () {
    Route::get('/', ['index']);
    Route::post('/store',['index']);
    Route::get('/{id}', ['edit']);
    Route::post('/{id}', ['update']);
});

