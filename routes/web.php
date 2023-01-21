<?php

use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\ArchiveController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/portfolio', [\App\Http\Controllers\PortfolioController::class, 'index'])->name('portfolio');

// Route::get('/portfolio/{portfolio:slug}', [\App\Http\Controllers\PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'is-admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::view('/', 'dashboard')->name('dashboard');

        Route::prefix('portfolio')->group(function () {
            Route::controller(PortfolioController::class)->group(function () {
                Route::get('/', 'index')->name('admin.portfolio');
                Route::get('/create', 'create');
                Route::post('/create', 'store')->name('admin.portfolio.create');
                Route::get('/update/{portfolio:id}', 'edit')->name('admin.portfolio.edit');
                Route::post('/update/{portfolio:id}', 'update')->name('admin.portfolio.update');
                Route::delete('/delete/{portfolio:id}', 'delete')->name('admin.portfolio.delete');
            });
        });

        Route::prefix('archive')->group(function () {
            Route::controller(ArchiveController::class)->group(function () {
                Route::get('/', 'index')->name('admin.archive');
                Route::post('/restore', 'restore')->name('admin.archive.restore');
            });
        });
    });
});
