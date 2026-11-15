{{-- resources/views/pages/admin/master-level/render/show.blade.php --}}
@extends('pages.admin.master-level.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Level</h6>
                <a href="{{ route('admin.master-level.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Level</label>
                    <input type="text" class="form-control" value="{{ $level->nama }}" readonly>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="3" readonly>{{ $level->keterangan }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" value="{{ $level->status }}" disabled>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
