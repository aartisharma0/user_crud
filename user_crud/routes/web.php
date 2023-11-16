<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/', function () {
//     return view('manageUser');
// });

// Route::get('/create', function () {
//     return view('createUser');
// });






// Route::view('/'.'trash');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('users', UserController::class);

    Route::get('/trash', [UserController::class, 'del'])->name('trash');
    Route::get('/users/restore/{id}', [UserController::class, 'restore'])->name('restore');
    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
