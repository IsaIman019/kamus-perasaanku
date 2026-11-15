{{-- resources/views/pages/admin/master-perasaan/render/show.blade.php --}}
@extends('pages.admin.master-perasaan.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Emosi</h6>
                <a href="{{ route('admin.master-perasaan.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label>Nama Emosi</label>
                    <input type="text" class="form-control" value="{{ $perasaan->nama }}" readonly>
                </div>

                <div class="form-group">
                    <label>Keterangan 1</label>
                    <textarea class="form-control" rows="3" readonly>{{ $perasaan->keterangan1 }}</textarea>
                </div>
                <div class="form-group">
                    <label>Keterangan 2</label>
                    <textarea class="form-control" rows="3" readonly>{{ $perasaan->keterangan2 }}</textarea>
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    @if($perasaan->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $perasaan->gambar) }}" alt="Gambar Emosi" class="img-fluid" style="max-height:150px;">
                        </div>
                    @else
                        <div class="text-muted">Tidak ada gambar</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Gambar Real</label>
                    @if($perasaan->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $perasaan->gambar_real) }}" alt="Gambar Emosi Real" class="img-fluid" style="max-height:150px;">
                        </div>
                    @else
                        <div class="text-muted">Tidak ada gambar real</div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Audio</label>
                    @if($perasaan->audio)
                        <div class="mb-2">
                            <audio controls>
                                <source src="{{ asset('storage/' . $perasaan->audio) }}" type="audio/mpeg">
                                Browser Anda tidak mendukung audio.
                            </audio>
                        </div>
                    @else
                        <div class="text-muted">Tidak ada audio</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" value="{{ $perasaan->status }}" disabled>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
