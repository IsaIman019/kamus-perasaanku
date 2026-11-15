<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LevelModel;
use App\Models\PerasaanModel;
use App\Models\SoalModel;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    // Tampilkan index
    public function index()
    {
        $soal = SoalModel::with('level')->orderBy('id', 'asc')->get();
        return view('pages.admin.master-soal.render.index', compact('soal'));
    }

    // Form create
    public function create()
    {
        $levels = LevelModel::where('status', 'ACTIVE')->get();
        $perasaan = PerasaanModel::where('status', 'ACTIVE')->get();
        return view('pages.admin.master-soal.render.create', compact('levels', 'perasaan'));
    }

    // Simpan data
    public function store(Request $request)
    {
        $data = $request->all();
        $levelId = $request->input('level_id'); 

        if(isset($data['soal']) && is_array($data['soal'])) {
            foreach($data['soal'] as $s) {

                $gambarPath = null;
                if(isset($s['gambar']) && $s['gambar'] instanceof \Illuminate\Http\UploadedFile){
                    $gambarPath = $s['gambar']->store('soal', 'public'); 
                    // hasilnya "soal/namafile.png"
                }

                SoalModel::create([
                    'level_id' => $levelId,
                    'judul' => $s['judul'],
                    'pertanyaan' => $s['pertanyaan'],
                    'gambar' => $gambarPath,
                    'deskripsi' => $s['deskripsi'] ?? null,
                    'jumlah_isian' => $s['jumlah_isian'] ?? 1,
                    'jawaban_benar' => $s['jawaban_benar'] ?? [], 
                    'bobot' => $s['bobot'] ?? 100,
                    'background_color' => $s['background_color'] ?? '#ffffff',
                    'status' => $s['status'] ?? 'ACTIVE',
                ]);
            }
        }

        return redirect()->route('admin.master-soal.index')
                        ->with('success', 'Data soal berhasil disimpan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $soal = SoalModel::findOrFail($id);
        $levels = LevelModel::where('status', 'ACTIVE')->get();
        $perasaan = PerasaanModel::where('status', 'ACTIVE')->get();
        return view('pages.admin.master-soal.render.edit', compact('soal', 'levels', 'perasaan'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $soal = SoalModel::findOrFail($id);
        $data = $request->all();

        $gambarPath = $soal->gambar;
        if(isset($data['gambar']) && $data['gambar'] instanceof \Illuminate\Http\UploadedFile){
            $gambarPath = $data['gambar']->store('soal', 'public');
        }

        $soal->update([
            'level_id' => $data['level_id'],
            'judul' => $data['judul'],
            'pertanyaan' => $data['pertanyaan'],
            'gambar' => $gambarPath,
            'deskripsi' => $data['deskripsi'] ?? null,
            'jumlah_isian' => $data['jumlah_isian'] ?? 1,
            'jawaban_benar' => $data['jawaban_benar'],
            'bobot' => $data['bobot'] ?? 100,
            'background_color' => $data['background_color'],
            'status' => $data['status'] ?? 'ACTIVE',
        ]);

        return redirect()->route('admin.master-soal.index')
                        ->with('success', 'Data soal berhasil diupdate.');
    }


    // Hapus data
    public function destroy($id)
    {
        $soal = SoalModel::findOrFail($id);
        $soal->delete();

        return redirect()->route('admin.master-soal.index')
                         ->with('success', 'Data soal berhasil dihapus.');
    }

    // Show detail
    public function show($id)
    {
        $soal = SoalModel::with('level')->findOrFail($id);
        $perasaan = PerasaanModel::all(); 
        return view('pages.admin.master-soal.render.show', compact('soal', 'perasaan'));
    }
}
