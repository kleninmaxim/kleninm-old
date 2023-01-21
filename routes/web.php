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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::prefix('portfolio')->group(function () {
            Route::get('/', [PortfolioController::class, 'index'])->name('admin.portfolio');
            Route::get('/create', [PortfolioController::class, 'create']);
            Route::post('/create', [PortfolioController::class, 'store'])->name('admin.portfolio.create');
            Route::get('/update/{portfolio:id}', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
            Route::post('/update/{portfolio:id}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
            Route::delete('/delete/{portfolio:id}', [\App\Http\Controllers\PortfolioController::class, 'delete'])->name('admin.portfolio.delete');
        });

        Route::prefix('archive')->group(function () {
            Route::get('/', [ArchiveController::class, 'index'])->name('admin.archive');
            Route::post('/restore', [ArchiveController::class, 'restore'])->name('admin.archive.restore');
        });

//        Route::get('/portfolio', function () {
//            return view('dashboard.portfolio', ['test' => \App\Models\Test::first()]);
//        })->name('portfolio');


//        Route::get('portfolio', [PostController::class, 'show']);

//        Route::post('/portfolio/update', function (\Illuminate\Http\Request $request) {
//            $portfolio = \App\Models\Test::where('id', $request['id']);
//            $portfolio->update(['body' => $request['body']]);
//
//            return redirect()->back()->with('success', 'Saved!');
//        })->name('portfolio.update');
    });
});
