<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class PortfolioController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('dashboard.portfolio.index', ['portfolios' => Portfolio::all()]);
    }

    public function create(): Factory|View|Application
    {
        return view('dashboard.portfolio.create');
    }

    public function edit(Portfolio $portfolio): Factory|View|Application
    {
        return view('dashboard.portfolio.edit', ['portfolio' => $portfolio]);
    }

    public function store(): RedirectResponse
    {
        Portfolio::create(array_merge($this->validatePost(), [
            'thumbnail' => request()->file('thumbnail')->store('portfolios', ['disk' => 'public'])
        ]));
        return redirect()->route('portfolio')->with('success', 'Saved!');
    }

    public function update(Portfolio $portfolio): RedirectResponse
    {
        $attributes = $this->validatePost($portfolio);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('portfolios', ['disk' => 'public']);
        }

        $portfolio->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    protected function validatePost(?Portfolio $portfolio = null): array
    {
        $portfolio ??= new Portfolio();
        return request()->validate([
            'title' => ['required', 'min:2', 'max:50'],
            'description' => ['required', 'min:2', 'max:511'],
            'body' => ['required', 'min:2', 'max:511'],
            'slug' => ['required', 'min:2', 'max:100', Rule::unique('portfolios', 'slug')->ignore($portfolio)],
            'link' => ['max:255'],
            'thumbnail' => $portfolio->exists ? ['image', 'max:5096'] : ['required', 'image', 'max:5096']
        ]);
    }
}
