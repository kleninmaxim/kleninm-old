<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('portfolio', ['portfolios' => Portfolio::query()->select('title', 'slug', 'description', 'thumbnail')->get()]);
    }

    public function show(Portfolio $portfolio): Factory|View|Application
    {
        return view('portfolio.example-one', ['portfolio' => $portfolio]);
    }
}
