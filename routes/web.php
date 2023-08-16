<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\AdminController;
use App\Http\Controllers\user\SuperAdminController;
use App\Http\Controllers\user\SubAdminController;

use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\SuperAdminAuthentication;


use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


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


Route::get('/',[HomeController::class,'index'])->name('home');


 Route::middleware(['web','isSuperAdmin'])->group(function(){
    Route::get('/super-admin/dashboard',[SuperAdminController::class,'dashboard'])->name('super-admin.dashboard');
 });

 Route::middleware(['web','isSubAdmin'])->group(function(){
    Route::get('/sub-admin/dashboard',[SubAdminController::class,'dashboard'])->name('sub-admin.dashboard');
 });

 Route::middleware(['web','admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
 });



