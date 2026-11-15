<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JawabanUserModel;
use App\Models\LevelModel;
use App\Models\SoalModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers   = User::where('role', 'User')->count();
        $totalLevels  = LevelModel::count();
        $totalSoal    = SoalModel::count();
        $today        = Carbon::today();
        $jawabanHariIni = JawabanUserModel::whereDate('created_at', $today)->count();

        $recentActivity = JawabanUserModel::with('user', 'soal')
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        return view('pages.admin.dashboard', compact(
            'totalUsers', 'totalLevels', 'totalSoal', 'jawabanHariIni', 'recentActivity'
        ));
    }
}
