@extends('pages.admin.master-users.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Soal</h6>
                <a href="{{ route('admin.master-soal.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.master-soal.update', $soal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Level (readonly) -->
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" class="form-control" value="{{ $soal->level->nama }}" readonly>
                        <input type="hidden" name="level_id" value="{{ $soal->level_id }}">
                    </div>

                    <div class="soal-item border p-3 mb-3" data-index="0">
                        <h5>Soal {{ $soal->id }}</h5>

                        <div class="form-group">
                            <label>Judul Soal</label>
                            <input type="text" class="form-control" name="judul" value="{{ $soal->judul }}" required>
                        </div>

                        <div class="form-group">
                            <label>Pertanyaan</label>
                            <textarea class="form-control" name="pertanyaan" required>{{ $soal->pertanyaan }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar (Opsional)</label>
                            @if($soal->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $soal->gambar) }}" alt="Gambar Soal" class="img-fluid" style="max-width:200px">
                                </div>
                            @endif
                            <input type="file" class="form-control" name="gambar">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi (Opsional)</label>
                            <textarea class="form-control" name="deskripsi">{{ $soal->deskripsi }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Isian</label>
                            <input type="number" class="form-control" name="jumlah_isian" value="{{ $soal->jumlah_isian }}" min="1" required>
                        </div>

                        <div class="form-group">
                            <label>Jawaban Benar</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Jawaban</h6>
                                    @foreach($perasaan as $p)
                                    <div class="form-check">
                                        <input class="form-check-input jawaban-checkbox" type="checkbox"
                                            value="{{ $p->id }}" data-soal-index="0"
                                            id="jawaban-0-{{ $p->id }}"
                                            {{ in_array($p->id, $soal->jawaban_benar ?? []) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jawaban-0-{{ $p->id }}">{{ $p->nama }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <h6>Jawaban Terpilih (Urutan Klik)</h6>
                                    <div class="jawaban-terpilih" id="jawaban-terpilih-0"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Bobot</label>
                            <input type="number" class="form-control" name="bobot" value="{{ $soal->bobot }}" min="1" required>
                        </div>
                        <div class="form-group">
                            <label>Warna Background</label>
                            <input type="color" class="form-control form-control-color" 
                                name="background_color" 
                                value="{{ $soal->background_color ?? '#ffffff' }}">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="ACTIVE" {{ $soal->status == 'ACTIVE' ? 'selected' : '' }}>Aktif</option>
                                <option value="INACTIVE" {{ $soal->status == 'INACTIVE' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let selectedAnswers = {0: []};

// Inisialisasi jawaban terpilih dari DB
selectedAnswers[0] = @json($soal->jawaban_benar ?? []);

function renderSelectedAnswers() {
    let html = '';
    selectedAnswers[0].forEach(ans => {
        let id = typeof ans === 'object' ? ans.id : ans;
        let name = typeof ans === 'object' ? ans.name : $('#jawaban-0-' + id).next('label').text().trim();
        html += `<div class="selected-answer" data-id="${id}">${name}</div>
                 <input type="hidden" name="jawaban_benar[]" value="${id}">`;
    });
    $('#jawaban-terpilih-0').html(html);
}

// Render awal
renderSelectedAnswers();

// Checkbox click handler
$(document).on('change', '.jawaban-checkbox', function() {
    const id = $(this).val();
    const name = $(this).next('label').text().trim();

    if($(this).is(':checked')) {
        selectedAnswers[0].push({id, name});
    } else {
        selectedAnswers[0] = selectedAnswers[0].filter(ans => ans.id != id);
    }

    renderSelectedAnswers();
});
</script>
@endpush
