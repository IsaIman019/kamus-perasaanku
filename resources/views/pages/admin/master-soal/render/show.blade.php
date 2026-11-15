@extends('pages.admin.master-users.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Soal</h6>
                <a href="{{ route('admin.master-soal.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                
                <!-- Level -->
                <div class="form-group">
                    <label>Level</label>
                    <input type="text" class="form-control" value="{{ $soal->level->nama }}" readonly>
                </div>

                <!-- Judul Soal -->
                <div class="form-group">
                    <label>Judul Soal</label>
                    <input type="text" class="form-control" value="{{ $soal->judul }}" readonly>
                </div>

                <!-- Pertanyaan -->
                <div class="form-group">
                    <label>Pertanyaan</label>
                    <textarea class="form-control" rows="3" readonly>{{ $soal->pertanyaan }}</textarea>
                </div>

                <!-- Gambar -->
                @if($soal->gambar)
                <div class="form-group">
                    <label>Gambar</label>
                    <div>
                        <img src="{{ asset('storage/' . $soal->gambar) }}" alt="Gambar Soal" class="img-fluid">
                    </div>
                </div>
                @endif

                <!-- Deskripsi -->
                @if($soal->deskripsi)
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" rows="2" readonly>{{ $soal->deskripsi }}</textarea>
                </div>
                @endif

                <!-- Jumlah Isian -->
                <div class="form-group">
                    <label>Jumlah Isian</label>
                    <input type="number" class="form-control" value="{{ $soal->jumlah_isian }}" readonly>
                </div>

                <!-- Jawaban Benar (urutan klik) -->
                <div class="form-group">
                    <label>Jawaban Benar (Urutan Klik)</label>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Semua Pilihan</h6>
                            @foreach($perasaan as $p)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" 
                                        value="{{ $p->id }}" 
                                        id="jawaban-{{ $p->id }}"
                                        @if(in_array($p->id, $soal->jawaban_benar ?? [])) checked @endif
                                        disabled>
                                    <label class="form-check-label" for="jawaban-{{ $p->id }}">{{ $p->nama }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-6">
                            <h6>Jawaban Terpilih (Urutan Klik)</h6>
                            <div id="jawaban-terpilih-show">
                                @if($soal->jawaban_benar)
                                    @foreach($soal->jawaban_benar as $id)
                                        @php
                                            $p = $perasaan->firstWhere('id', $id);
                                        @endphp
                                        @if($p)
                                            <div class="selected-answer">{{ $p->nama }}</div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bobot -->
                <div class="form-group">
                    <label>Bobot</label>
                    <input type="number" class="form-control" value="{{ $soal->bobot }}" readonly>
                </div>
                <div class="form-group">
                    <label>Warna Background</label>
                    <div>
                        <input type="color" class="form-control form-control-color" 
                            value="{{ $soal->background_color ?? '#ffffff' }}" disabled>
                    </div>
                    <small class="form-text text-muted">
                        *Warna background soal
                    </small>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" class="form-control" value="{{ $soal->status }}" readonly>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
