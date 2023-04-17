<?php

use App\Http\Controllers\CostController;
use App\Http\Controllers\MasterCostController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::resource('mastercost', MasterCostController::class);
Route::controller(MasterCostController::class)->prefix('mastercost')->name('mastercost.')->group( function (){
    Route::get('datatable', 'datatable')->name('datatable');
});



