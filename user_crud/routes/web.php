<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('manageUser');
});

Route::get('/create', function () {
    return view('createUser');
});
