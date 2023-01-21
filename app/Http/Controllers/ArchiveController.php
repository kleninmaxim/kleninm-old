<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('dashboard.archive.index', ['archives' => DB::table('deleted_models')->select('id', 'key', 'model', 'values')->orderByDesc('created_at')->get()]);
    }

    public function restore(Request $request): RedirectResponse
    {
        $model = new $request['model'];
        $model::restore($request['key']);
        return redirect()->back();
    }
}
