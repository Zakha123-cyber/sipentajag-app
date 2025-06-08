<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Get count of active users with role 'user'
        $activeUsers = User::where('role', 'user')->count();

        // Calculate average confidence from all scans
        $averageAccuracy = Scan::whereNotNull('confidence')
            ->avg('confidence');

        // Round accuracy to 2 decimal places
        $averageAccuracy = round($averageAccuracy ?? 0, 2);

        // Count unique diseases that have been scanned
        $detectedDiseases = Scan::select('disease_id')
            ->distinct()
            ->count();

        return view('landing.index', compact('activeUsers', 'averageAccuracy', 'detectedDiseases'));
    }
}
