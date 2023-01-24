<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ArchiveController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('dashboard.archive.index', ['archives' => DB::table('deleted_models')->select('id', 'key', 'model', 'values')->orderByDesc('created_at')->get()]);
    }

    public function restore(): RedirectResponse
    {
        $attributes = $this->validateDeletedModel();

        ($attributes['model'])::restore($attributes['key']);

        return redirect()->back();
    }

    protected function validateDeletedModel(): array
    {
        return request()->validate([
            'model' => ['required', 'string', 'max:255', Rule::exists('deleted_models', 'model')],
            'key' => ['required', 'string', 'max:40', Rule::exists('deleted_models', 'key')]
        ]);
    }
}
