{{-- resources/views/pages/admin/master-level/render/edit.blade.php --}}
@extends('pages.admin.master-level.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Level</h6>
                <a href="{{ route('admin.master-level.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.master-level.update', $level->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama Level</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $level->nama) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $level->keterangan) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">-- Pilih status --</option>
                            <option value="ACTIVE" {{ old('status', $level->status) == 'ACTIVE' ? 'selected' : '' }}>Aktif</option>
                            <option value="INACTIVE" {{ old('status', $level->status) == 'INACTIVE' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Perbarui
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
