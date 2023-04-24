<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackHomeController;
use App\Http\Controllers\FrontHomeController;
Route::get('/',FrontHomeController::class)->middleware('auth')->name('index');

require __DIR__.'/auth.php';

Route::prefix('back')->name('back.')->group(function () {
    Route::get('/',BackHomeController::class)->middleware('admin')->name('index');
    require __DIR__.'/adminAuth.php';
});


