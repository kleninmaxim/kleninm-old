<?php

use App\Http\Controllers\PortfolioController;
use GrahamCampbell\Markdown\Facades\Markdown;
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

Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
        Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
        Route::post('/portfolio/create', [PortfolioController::class, 'store'])->name('portfolio.create');
        Route::get('/portfolio/{portfolio:id}', [PortfolioController::class, 'edit'])->name('portfolio.edit');

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
