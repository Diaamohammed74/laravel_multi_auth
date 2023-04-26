<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackHomeController;
use App\Http\Controllers\FrontHomeController;

Route::get('/',FrontHomeController::class)->middleware('auth')->name('index');

require __DIR__.'/auth.php';


Route::prefix('back')->name('back.')->group(function ()
{
    Route::middleware('admin')->group(function(){
        
        Route::get('/',BackHomeController::class)->name('index');

        Route::prefix('/admin')->name('admins.')->controller(AdminController::class)->group(function(){
                Route::get('/index','index')->name('index');
                Route::get('/create','create')->name('create');
                Route::post('/store','store')->name('store');
            });

        Route::prefix('/roles')->name('roles.')->controller(RoleController::class)->group(function(){
                Route::get('/index','index')->name('index');
                Route::get('/create','create')->name('create');
                Route::post('/store','store')->name('store');
                Route::get('/edit/{role_id}','edit')->name('edit');
                Route::post('/update/{role_id}','update')->name('update');
                Route::delete('/delete/{role_id}','destroy')->name('delete');
            });
    });
    require __DIR__.'/adminAuth.php';
});




