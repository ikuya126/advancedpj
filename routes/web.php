<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\AttendController;
use App\Http\Controllers\RestController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', [RegisteredController::class, 'index']);
Route::post('/register', [RegisteredController::class, 'create']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/attendance', [AttendController::class, 'index']);
Route::post('/work_start', [AttendController::class, 'start']);
Route::post('/work_end', [AttendController::class, 'end']);

Route::post('/rest_start', [RestController::class, 'start']);
Route::post('/rest_end', [RestController::class, 'end']);