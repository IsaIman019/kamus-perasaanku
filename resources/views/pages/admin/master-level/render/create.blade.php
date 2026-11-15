{{-- resources/views/pages/admin/master-level/render/create.blade.php --}}
@extends('pages.admin.master-level.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Level</h6>
                <a href="{{ route('admin.master-level.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.master-level.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Level</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama level" value="{{ old('nama') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan level">{{ old('keterangan') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">-- Pilih status --</option>
                            <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>Aktif</option>
                            <option value="INACTIVE" {{ old('status') == 'INACTIVE' ? 'selected' : '' }}>Tidak Aktif</option>
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
