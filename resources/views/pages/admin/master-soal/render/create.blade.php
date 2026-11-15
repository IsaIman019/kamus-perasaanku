@extends('pages.admin.master-users.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Soal</h6>
                <a href="{{ route('admin.master-soal.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.master-soal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Pilih Level -->
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" id="level" name="level_id" required>
                            <option value="">-- Pilih Level --</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="soal-container">
                        <!-- Form Soal Pertama -->
                        <div class="soal-item border p-3 mb-3" data-index="0">
                            <h5>Soal 1</h5>

                            <div class="form-group">
                                <label>Judul Soal</label>
                                <input type="text" class="form-control" name="soal[0][judul]" placeholder="Masukkan judul soal" required>
                            </div>

                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <textarea class="form-control" name="soal[0][pertanyaan]" placeholder="Masukkan pertanyaan" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Gambar (Opsional)</label>
                                <input type="file" class="form-control" name="soal[0][gambar]">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi (Opsional)</label>
                                <textarea class="form-control" name="soal[0][deskripsi]" placeholder="Masukkan deskripsi"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Jumlah Isian</label>
                                <input type="number" class="form-control" name="soal[0][jumlah_isian]" value="1" min="1" required>
                            </div>

                            <div class="form-group">
                                <label>Jawaban Benar</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Jawaban</h6>
                                        @foreach($perasaan as $p)
                                        <div class="form-check">
                                            <input class="form-check-input jawaban-checkbox" type="checkbox" value="{{ $p->id }}" data-soal-index="0" id="jawaban-0-{{ $p->id }}">
                                            <label class="form-check-label" for="jawaban-0-{{ $p->id }}">{{ $p->nama }}</label>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="col-md-6">
                                        <h6>Jawaban Terpilih (Urutan Klik)</h6>
                                        <div class="jawaban-terpilih" id="jawaban-terpilih-0"></div>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Level 1: Bisa pilih beberapa jawaban.</small>
                            </div>

                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="number" class="form-control" name="soal[0][bobot]" value="100" min="1" required>
                            </div>
                            <div class="form-group">
                                <label>Warna Background</label>
                                <input type="color" class="form-control form-control-color" 
                                    name="soal[0][background_color]" value="#ffffff">
                            </div>


                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="soal[0][status]" required>
                                    <option value="ACTIVE">Aktif</option>
                                    <option value="INACTIVE">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success mb-3" id="add-soal">
                        <i class="fas fa-plus"></i> Tambah Soal
                    </button>

                    <br>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Semua Soal
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let soalIndex = 1;
let selectedAnswers = {0: []};

// Tambah soal baru
$('#add-soal').click(function() {
    let html = `
    <div class="soal-item border p-3 mb-3" data-index="${soalIndex}">
        <h5>Soal ${soalIndex + 1}</h5>

        <div class="form-group">
            <label>Judul Soal</label>
            <input type="text" class="form-control" name="soal[${soalIndex}][judul]" placeholder="Masukkan judul soal" required>
        </div>

        <div class="form-group">
            <label>Pertanyaan</label>
            <textarea class="form-control" name="soal[${soalIndex}][pertanyaan]" placeholder="Masukkan pertanyaan" required></textarea>
        </div>

        <div class="form-group">
            <label>Gambar (Opsional)</label>
            <input type="file" class="form-control" name="soal[${soalIndex}][gambar]">
        </div>

        <div class="form-group">
            <label>Deskripsi (Opsional)</label>
            <textarea class="form-control" name="soal[${soalIndex}][deskripsi]" placeholder="Masukkan deskripsi"></textarea>
        </div>

        <div class="form-group">
            <label>Jumlah Isian</label>
            <input type="number" class="form-control" name="soal[${soalIndex}][jumlah_isian]" value="1" min="1" required>
        </div>

        <div class="form-group">
            <label>Jawaban Benar</label>
            <div class="row">
                <div class="col-md-6">
                    <h6>Jawaban</h6>
                    @foreach($perasaan as $p)
                    <div class="form-check">
                        <input class="form-check-input jawaban-checkbox" type="checkbox" data-soal-index="${soalIndex}" value="{{ $p->id }}" id="jawaban-${soalIndex}-{{ $p->id }}">
                        <label class="form-check-label" for="jawaban-${soalIndex}-{{ $p->id }}">{{ $p->nama }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h6>Jawaban Terpilih (Urutan Klik)</h6>
                    <div class="jawaban-terpilih" id="jawaban-terpilih-${soalIndex}"></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Bobot</label>
            <input type="number" class="form-control" name="soal[${soalIndex}][bobot]" value="100" min="1" required>
        </div>
        <div class="form-group">
            <label>Warna Background</label>
            <input type="color" class="form-control form-control-color" 
                name="soal[${soalIndex}][background_color]" value="#ffffff">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="soal[${soalIndex}][status]" required>
                <option value="ACTIVE">Aktif</option>
                <option value="INACTIVE">Tidak Aktif</option>
            </select>
        </div>

        <button type="button" class="btn btn-danger remove-soal mb-2"><i class="fas fa-trash"></i> Hapus Soal</button>
    </div>
    `;
    $('#soal-container').append(html);
    selectedAnswers[soalIndex] = []; // inisialisasi array jawaban baru
    soalIndex++;
});

// Hapus soal
$(document).on('click', '.remove-soal', function() {
    const idx = $(this).data('index');
    delete selectedAnswers[idx];
    $(this).closest('.soal-item').remove();
});

// Event delegation untuk semua checkbox (soal pertama & dinamis)
$(document).on('change', '.jawaban-checkbox', function() {
    const soalIdx = $(this).data('soal-index');
    const id = $(this).val();
    const name = $(this).next('label').text().trim();

    if($(this).is(':checked')){
        selectedAnswers[soalIdx].push({id, name});
    } else {
        selectedAnswers[soalIdx] = selectedAnswers[soalIdx].filter(ans => ans.id != id);
    }

    // Render jawaban terpilih sesuai urutan klik
    let html = '';
    selectedAnswers[soalIdx].forEach(ans => {
        html += `<div class="selected-answer" data-id="${ans.id}">${ans.name}</div>
                 <input type="hidden" name="soal[${soalIdx}][jawaban_benar][]" value="${ans.id}">`;
    });
    $(`#jawaban-terpilih-${soalIdx}`).html(html);
});
</script>
@endpush
