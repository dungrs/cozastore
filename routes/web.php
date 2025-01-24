<?php

use App\Http\Controllers\Backend\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController;

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

// Route::group(['middleware' => ['admin']], function() {
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
// });

Route::get('/', function() {
    return view('index');
});

Route::get('admin', [AuthController::class, 'index'])->name('auth.admin');
Route::get('login', [AuthController::class, 'login'])->name('auth.login');