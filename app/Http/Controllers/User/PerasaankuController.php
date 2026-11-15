<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PerasaanModel;
use Illuminate\Http\Request;

class PerasaankuController extends Controller
{
    public function index()
    {
        $perasaanku = PerasaanModel::all();
        return view('pages.user.perasaanku.render.index', compact('perasaanku'));
    }

    public function show($id)
    {
        $perasaan = PerasaanModel::findOrFail($id);
        return view('pages.user.perasaanku.render.show', compact('perasaan'));
    }
}
