<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PortfolioController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('portfolio', ['portfolios' => Portfolio::query()->select('title', 'slug', 'description', 'link', 'thumbnail')->orderByDesc('created_at')->get()]);
    }

    public function show(Portfolio $portfolio): Factory|View|Application
    {
        return view('portfolio.example-one', ['portfolio' => $portfolio]);
    }

    public function delete(Portfolio $portfolio): RedirectResponse
    {
        $portfolio->delete();
        return redirect()->back();
    }
}
