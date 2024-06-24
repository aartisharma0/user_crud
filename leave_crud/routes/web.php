<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeavenatureController;
use App\Http\Controllers\LeavestatusController;
use App\Http\Controllers\LeavetypeController;

Route::get('/', function () {
    return view('welcome');
});


// Leave Nature Routes

Route::resource('nature', LeavenatureController::class);

Route::get('/nature/restore/{id}', [LeavenatureController::class, 'restore'])->name('nature.restore');
Route::get('/nature/delete/{id}', [LeavenatureController::class, 'permanentdel'])->name('nature.delete');


// Leave Nature Routes

// Leave Type Routes

Route::resource('type',LeavetypeController::class);
Route::get('/type/restore/{id}', [LeavetypeController::class, 'restore'])->name('type.restore');
Route::get('/type/delete/{id}', [LeavetypeController::class, 'permanentdel'])->name('type.delete');

// Leave Type Routes

// Leave Status Routes

Route::resource('status',LeavestatusController::class);
Route::get('/status/restore/{id}', [LeavestatusController::class, 'restore'])->name('status.restore');
Route::get('/status/delete/{id}', [LeavestatusController::class, 'permanentdel'])->name('status.delete');

// Leave Status Routes
