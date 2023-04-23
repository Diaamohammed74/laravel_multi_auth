<?php

use App\Http\Controllers\FrontHomeController;
use Illuminate\Support\Facades\Route;
Route::get('/',FrontHomeController::class)->middleware('auth')->name('index');

Route::prefix('front')->name('front.')->group(function () {
    // Route::view('/login','front.auth.login');
    // Route::view('/register','front.auth.register');
    // Route::view('/forget-password','front.auth.forget-password');
});
require __DIR__.'/auth.php';

