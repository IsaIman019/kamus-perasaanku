<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JawabanUserModel;
use App\Models\LevelModel;
use App\Models\SkorUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PilihLevelController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $levels = LevelModel::withCount('soal')->orderBy('id')->get();
        $skorUser = SkorUserModel::where('user_id', $userId)->get()->keyBy('level_id');
        $totalSkor = $skorUser->sum('score');


        return view('pages.user.pilih-level.render.index', compact('levels', 'skorUser', 'totalSkor'));
    }
    public function resetSemuaLevel()
    {
        $userId = Auth::id();

        // Hapus semua jawaban user
        JawabanUserModel::where('user_id', $userId)->delete();

        // Reset semua skor
        SkorUserModel::where('user_id', $userId)->delete();

        return redirect()->route('user.pilih-level.index')
                        ->with('success', 'Semua level telah di-reset.');
    }

}
