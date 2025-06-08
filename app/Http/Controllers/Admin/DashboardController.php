<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Scan;
use App\Models\Article;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_scans' => Scan::count(),
            'total_articles' => Article::count(),
            'recent_scans' => Scan::with(['user', 'disease'])
                ->latest()
                ->take(5)
                ->get(),
            'recent_users' => User::latest()
                ->take(5)
                ->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
