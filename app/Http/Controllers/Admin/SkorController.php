<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LevelModel;
use App\Models\SkorUserModel;
use App\Models\User;
use Illuminate\Http\Request;

class SkorController extends Controller
{
    public function index()
    {
        $users = User::with('skor.level')->where('role', 'User')->get();

        return view('pages.admin.skor-user.render.index', compact('users'));
    }

    // Show: detail skor per level untuk satu user
    public function show($userId)
    {
        $user = User::with('skor.level')->findOrFail($userId);

        return view('pages.admin.skor-user.render.show', compact('user'));
    }
}
