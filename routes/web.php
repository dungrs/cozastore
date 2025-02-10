<?php

use Illuminate\Support\Facades\Route;

// BACKEND CONTROLLER
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\User\UserCatalogueController;
use App\Http\Controllers\Backend\LanguageController;

// AJAX CONTROLLER
use App\Http\Controllers\Ajax\User\UserCatalogueController as AjaxUserCatalogueController;
use App\Http\Controllers\Ajax\User\UserController as AjaxUserController;
use App\Http\Controllers\Ajax\LanguageController as AjaxLanguageController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Ajax\LocationController as AjaxLocationController;


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

Route::group(['middleware' => ['admin']], function() {
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // USER
    Route::prefix('user')->group(function() {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
    });

    // USER CATALOGUE
    Route::prefix('user/catalogue')->group(function() {
        Route::get('index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index');
    });

    // LANGUAGE
    Route::prefix('language')->group(function() {
        Route::get('index', [LanguageController::class, 'index'])->name('language.index');
        Route::get('{id}/switch', [LanguageController::class, 'switchBackendLanguage'])-> name('language.backend.switch')->where(['id' => '[0-9]+']);
    });

    // AJAX USERCATALOGUE
    Route::prefix('ajax')->group(function() {
        // USER CATALOGUE
        Route::prefix('user/catalogue')->group(function() {
            Route::post('/create', [AjaxUserCatalogueController::class, 'create'])->name('ajax.user.catalogue.create');
            Route::post('/update/{id}/{language_id}', [AjaxUserCatalogueController::class, 'update'])->name('ajax.user.catalogue.update')->where(['id' => '[0-9]+', 'language_id' => '[0-9]+']);
            Route::get('/delete/{id}', [AjaxUserCatalogueController::class, 'delete'])->name('ajax.user.catalogue.delete')->where(['id' => '[0-9]+']);
            Route::get('/filter', [AjaxUserCatalogueController::class, 'filter'])->name('ajax.user.catalogue.filter');
            Route::get('/edit/{id}/{language_id}', [AjaxUserCatalogueController::class, 'edit'])->name('ajax.user.catalogue.edit')->where(['id' => '[0-9]+', 'language_id' => '[0-9]+']);
            Route::get('/details/{id}/', [AjaxUserCatalogueController::class, 'details'])->name('ajax.user.catalogue.details')->where(['id' => '[0-9]+']);
            Route::post('/translate/{id}', [AjaxUserCatalogueController::class, 'translate'])->name('ajax.user.catalogue.translate')->where(['id' => '[0-9]+']);
        });

        // USER
        Route::prefix('user')->group(function() {
            Route::post('/create', [AjaxUserController::class, 'create'])->name('ajax.user.create');
            Route::post('/update/{id}', [AjaxUserController::class, 'update'])->name('ajax.user.update')->where(['id' => '[0-9]+']);
            Route::get('/delete/{id}', [AjaxUserController::class, 'delete'])->name('ajax.user.delete')->where(['id' => '[0-9]+']);
            Route::get('/filter', [AjaxUserController::class, 'filter'])->name('ajax.user.filter');
            Route::get('/edit/{id}', [AjaxUserController::class, 'edit'])->name('ajax.user.edit')->where(['id' => '[0-9]+']);
        });

        // LANGUAGE
        Route::prefix('language')->group(function() {
            Route::post('/create', [AjaxLanguageController::class, 'create'])->name('ajax.language.create');
            Route::post('/update/{id}', [AjaxLanguageController::class, 'update'])->name('ajax.language.update')->where(['id' => '[0-9]+']);
            Route::get('/delete/{id}', [AjaxLanguageController::class, 'delete'])->name('ajax.language.delete')->where(['id' => '[0-9]+']);
            Route::get('/filter', [AjaxLanguageController::class, 'filter'])->name('ajax.language.filter');
            Route::get('/edit/{id}', [AjaxLanguageController::class, 'edit'])->name('ajax.language.edit')->where(['id' => '[0-9]+']);
        });

        Route::prefix('dashboard')->group(function() {
            Route::post('/changeStatus/{id}', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changePublish')->where(['id' => '[0-9]+']);
            Route::post('/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');
        });
    });
});


Route::get('admin', [AuthController::class, 'index'])->name('auth.admin');
Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/ajax/location/getLocation', [AjaxLocationController::class, 'getLocation'])->name('location.getLocation');

