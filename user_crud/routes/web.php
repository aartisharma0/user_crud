<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('manageUser');
// });

// Route::get('/create', function () {
//     return view('createUser');
// });



Route::resource('users', UserController::class);

Route::get('/trash',[UserController::class,'del'])->name('trash');
Route::get('/users/restore/{id}',[UserController::class,'restore'])->name('restore');
Route::get('/users/delete/{id}',[UserController::class,'delete'])->name('delete');


// Route::view('/'.'trash');