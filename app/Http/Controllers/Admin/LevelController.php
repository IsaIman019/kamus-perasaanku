<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LevelController extends Controller
{
    public function index()
    {
        $levels = LevelModel::all();
        return view('pages.admin.master-level.render.index', compact('levels'));
    }

    public function create()
    {
        return view('pages.admin.master-level.render.create');
    }

    public function store(Request $request)
    {
        try {
            LevelModel::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'status' => $request->status
            ]);

            return redirect()
                ->route('admin.master-level.index')
                ->with('success', 'Level berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Store Level Error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $level = LevelModel::findOrFail($id);
        return view('pages.admin.master-level.render.show', compact('level'));
    }

    public function edit($id)
    {
        $level = LevelModel::findOrFail($id);
        return view('pages.admin.master-level.render.edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        try {
            $level = LevelModel::findOrFail($id);
            $level->update([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'status' => $request->status
            ]);

            return redirect()
                ->route('admin.master-level.index')
                ->with('success', 'Level berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Update Level Error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $level = LevelModel::findOrFail($id);
            $level->delete();
            return redirect()->route('admin.master-level.index')
                ->with('success', 'Level berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Delete Level Error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
