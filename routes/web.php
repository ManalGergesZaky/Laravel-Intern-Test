<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[UserController::class,'index'])->name('users.index');
Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/users/create',[UserController::class , 'create'])->name('users.create');
Route::post('/users/export', [UserController::class, 'export'])->name('users.export');
Route::post('/users/import', [UserController::class, 'import'])->name('users.import');




