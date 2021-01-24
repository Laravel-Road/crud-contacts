<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/contacts', 'contacts.index')->name('contacts.index');
});


