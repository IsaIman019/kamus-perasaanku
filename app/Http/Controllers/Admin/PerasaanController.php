<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerasaanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PerasaanController extends Controller
{
    public function index()
    {
        $perasaans = PerasaanModel::all();
        return view('pages.admin.master-perasaan.render.index', compact('perasaans'));
    }

    public function create()
    {
        return view('pages.admin.master-perasaan.render.create');
    }

    public function store(Request $request)
    {
        try {
            $gambarPath = null;
            $audioPath = null;

            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('perasaan/gambar', 'public');
            }
            if ($request->hasFile('gambar_real')) {
                $gambarRealPath = $request->file('gambar_real')->store('perasaan/gambar_real', 'public');
            }

            if ($request->hasFile('audio')) {
                $audioPath = $request->file('audio')->store('perasaan/audio', 'public');
            }

            PerasaanModel::create([
                'nama'       => $request->nama,
                'keterangan1' => $request->keterangan1,
                'keterangan2' => $request->keterangan2,
                'gambar'     => $gambarPath,
                'gambar_real'     => $gambarRealPath,
                'audio'      => $audioPath,
                'status'     => $request->status,
            ]);

            return redirect()
                ->route('admin.master-perasaan.index')
                ->with('success', 'Data Perasaan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function show(PerasaanModel $PerasaanModel, $id)
    {
        $perasaan = PerasaanModel::findOrFail($id);
        return view('pages.admin.master-perasaan.render.show', compact('perasaan'));
    }

    public function edit(PerasaanModel $PerasaanModel, $id)
    {
        $perasaan = PerasaanModel::findOrFail($id);
        return view('pages.admin.master-perasaan.render.edit', compact('perasaan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $perasaan = PerasaanModel::findOrFail($id);
            $gambarPath = $perasaan->gambar;
            $gambarRealPath = $perasaan->gambar_real;
            $audioPath = $perasaan->audio;

            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('perasaan/gambar', 'public');
            }
            if ($request->hasFile('gambar_real')) {
                $gambarRealPath = $request->file('gambar_real')->store('perasaan/gambar_real', 'public');
            }
            if ($request->hasFile('audio')) {
                $audioPath = $request->file('audio')->store('perasaan/audio', 'public');
            }

            $perasaan->update([
                'nama'       => $request->nama,
                'keterangan1' => $request->keterangan1,
                'keterangan2' => $request->keterangan2,
                'gambar'     => $gambarPath,
                'gambar_real'     => $gambarRealPath,
                'audio'      => $audioPath,
                'status'     => $request->status,
            ]);

            return redirect()
                ->route('admin.master-perasaan.index')
                ->with('success', 'Data Perasaan berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Update Perasaan Error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(PerasaanModel $PerasaanModel, $id)
    {
        try {
            $perasaan = PerasaanModel::findOrFail($id);
            $perasaan->delete();

            return redirect()
                ->route('admin.master-perasaan.index')
                ->with('success', 'Data Perasaan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
