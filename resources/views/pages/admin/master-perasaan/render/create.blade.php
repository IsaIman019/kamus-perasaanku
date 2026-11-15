{{-- resources/views/pages/admin/master-perasaan/render/create.blade.php --}}
@extends('pages.admin.master-perasaan.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Emosi</h6>
                <a href="{{ route('admin.master-perasaan.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.master-perasaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama Emosi</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama emosi" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan1">Keterangan 1</label>
                        <textarea class="form-control" id="keterangan1" name="keterangan1" rows="3" placeholder="Masukkan keterangan 1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="keterangan2">Keterangan 2</label>
                        <textarea class="form-control" id="keterangan2" name="keterangan2" rows="3" placeholder="Masukkan keterangan 2"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Real</label>
                        <input type="file" class="form-control" id="gambar_real" name="gambar_real" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="audio">Audio</label>
                        <input type="file" class="form-control" id="audio" name="audio" accept="audio/*">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="ACTIVE">Aktif</option>
                            <option value="INACTIVE">Tidak Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
