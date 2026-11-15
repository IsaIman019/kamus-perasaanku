@extends('pages.user.soal.wrapper')
@section('render')

<form id="form-soal" class="form-soal" action="{{ route('user.level.submit', [$level->id, $soal->id]) }}" method="POST">
    @csrf

    @php
    $jawabanBenar = is_array($soal->jawaban_benar)
    ? $soal->jawaban_benar
    : json_decode($soal->jawaban_benar, true);

    $warnaPerasaan = [
    'Senang' => '#9bc37b',
    'Marah' => '#f37349',
    'Takut' => '#ffe766',
    'Sedih' => '#7ba3df',
    ];
    @endphp

    <div class="p-4 rounded mb-4 text-center">

        {{-- Gambar soal (jika ada) --}}


        {{-- Pertanyaan --}}
        <h5 class="pertanyaan mb-3">{{ $soal->judul }}</h5>
        @if($level->id == 1)
        <h5 class="sub-pertanyaan mb-3">{{ $soal->pertanyaan }}</h5>
        @endif
        {{-- Konten Level --}}
        @if($level->id == 1)
        @php
        $opsiDiKiri = $soal->id % 2 == 1; // true = opsi kiri, false = opsi kanan
        @endphp
        {{-- Level 1: semua perasaan kiri, dropbox kanan --}}
        <div class="d-flex justify-content-between">
            @if($opsiDiKiri)
            {{-- Opsi kiri --}}
            <div class="draggable-item-wrapper d-flex flex-column gap-3
                    ">
                @foreach($perasaan as $p)

                <div class="draggable-item card-perasaan p-2" draggable="true" data-value="{{ $p->id }}"
                    data-audio="{{ $p->audio ? asset('storage/'.$p->audio) : '' }}"
                    style="background-color: {{ $warnaPerasaan[$p->nama] }}">
                    <img src="{{ asset('storage/'.$p->gambar) }}" class="mb-0" width="70">
                    <p class="mb-0 text-perasaan">{{ $p->nama }}</p>
                </div>
                @endforeach
            </div>

            {{-- Dropzone kanan --}}
            <div class="d-flex flex-column gap-3">
                @foreach($jawabanBenar as $idx => $pid)
                @php $p = $perasaan->firstWhere('id', $pid); @endphp
                <div class="d-flex align-items-center gap-5 target-jawaban">
                    <div class="drop-box rounded mb-0 p-3" data-target="{{ $soal->id }}-{{ $idx }}">
                        <span class="placeholder card-perasaan">Letakkan Disini</span>
                        <input type="hidden" name="jawaban[{{ $soal->id }}][]" value="">
                    </div>
                    <div class="target-img card-perasaan p-2" style="background-color: {{ $warnaPerasaan[$p->nama] }}">
                        <img src="{{ asset('storage/'.$p->gambar) }}" class="mb-0" width="70">
                        <p class="mb-0 text-perasaan">{{ $p->nama }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            @else
            {{-- Dropzone kiri --}}
            <div class="d-flex flex-column gap-3">
                @foreach($jawabanBenar as $idx => $pid)
                @php $p = $perasaan->firstWhere('id', $pid); @endphp
                <div class="d-flex align-items-center gap-5 target-jawaban">

                    <div class="target-img card-perasaan p-2" style="background-color: {{ $warnaPerasaan[$p->nama] }}">
                        <img src="{{ asset('storage/'.$p->gambar_real) }}" class="mb-0" width="70">
                    </div>
                    <div class="drop-box rounded mb-0 p-3" data-target="{{ $soal->id }}-{{ $idx }}">
                        <span class="placeholder card-perasaan">Letakkan Disini</span>
                        <input type="hidden" name="jawaban[{{ $soal->id }}][]" value="">
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Opsi kanan --}}
            <div class="draggable-item-wrapper d-flex flex-column gap-3 ">
                @foreach($perasaan as $p)
                <div class="draggable-item card-perasaan p-2" draggable="true" data-value="{{ $p->id }}"
                    data-audio="{{ $p->audio ? asset('storage/'.$p->audio) : '' }}"
                    style="background-color: {{ $warnaPerasaan[$p->nama] }}">
                    <img src="{{ asset('storage/'.$p->gambar) }}" class="mb-0" width="70">
                    <p class="mb-0 text-perasaan">{{ $p->nama }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        @elseif($level->id == 2)
        <div class="d-flex align-items-center level-2">
            {{-- Opsi kiri --}}
            <div class="draggable-item-wrapper  d-flex flex-column gap-3">
                @php
                $idJawaban = $jawabanBenar[0] ?? null;
                $pBenar = $perasaan->firstWhere('id', $idJawaban);
                $pSalah = $perasaan->where('id','!=',$idJawaban)->random(1)->first();
                $opsi = collect([$pBenar, $pSalah])->shuffle();
                @endphp
                @foreach($opsi as $p)
                <div class="draggable-item card-perasaan p-2" draggable="true" data-value="{{ $p->id }}"
                    data-audio="{{ $p->audio ? asset('storage/'.$p->audio) : '' }}"
                    style="background-color: {{ $warnaPerasaan[$p->nama] }}">
                    <img src="{{ asset('storage/'.$p->gambar) }}" class="mb-0" width="70">
                    <p class="mb-0 text-perasaan">{{ $p->nama }}</p>
                </div>
                @endforeach
            </div>

            {{-- Konten kanan --}}
            <div class="flex-grow-1 text-center">
                @if($soal->gambar)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$soal->gambar) }}" class="img-fluid" style="max-height:200px;">
                </div>
                @endif

                <p class="fw-bold text-soal">{{ $soal->pertanyaan }}</p>

                <div class="drop-box rounded p-3 mb-3 mx-auto" style="max-width:250px;" data-target="{{ $soal->id }}-0">
                    <span class="placeholder card-perasaan">Letakkan Disini</span>
                    <input type="hidden" name="jawaban[{{ $soal->id }}][]" value="">
                </div>
            </div>
        </div>

        @elseif($level->id == 3)
        <div class="d-flex align-items-center level-3">
            <div class="draggable-item-wrapper  d-flex flex-column gap-3">
                @foreach($perasaan->sortBy('id') as $p)
                <div class="draggable-item card-perasaan p-2" draggable="true" data-value="{{ $p->id }}"
                    data-audio="{{ $p->audio ? asset('storage/'.$p->audio) : '' }}"
                    style="background-color: {{ $warnaPerasaan[$p->nama] }}; ">
                    <img src="{{ asset('storage/'.$p->gambar) }}" class="mb-0" width="70">
                    <p class="mb-0 text-perasaan">{{ $p->nama }}</p>
                </div>
                @endforeach
            </div>

            <div class="flex-grow-1 text-center">
                @if($soal->gambar)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$soal->gambar) }}" class="img-fluid" style="max-height:200px;">
                </div>
                @endif

                <p class="fw-bold text-soal">{{ $soal->pertanyaan }}</p>

                <div class="drop-box rounded p-3 mb-3 mx-auto" style="max-width:250px;" data-target="{{ $soal->id }}-0">
                    <span class="placeholder card-perasaan">Letakkan Disini</span>
                    <input type="hidden" name="jawaban[{{ $soal->id }}][]" value="">
                </div>
            </div>
        </div>
        @endif


    </div>


</form>

<script>
const currentLevel = {
    {
        $level - > id
    }
};
const jawabanBenar = @json($jawabanBenar);
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    let draggedItem = null;
    const form = document.getElementById('form-soal');
    const dropBoxes = document.querySelectorAll('.drop-box');
    // draggable items
    document.querySelectorAll('.draggable-item').forEach(item => {
        item.addEventListener('dragstart', function() {
            draggedItem = this;
        });
    });
    let jumlahDrop = dropBoxes.length;
    let sudahDrop = 0;
    dropBoxes.forEach((box, idx) => {
        box.addEventListener('dragover', e => e.preventDefault());
        box.addEventListener('drop', function() {
            if (!draggedItem) return;
            this.innerHTML = "";
            let clone = draggedItem.cloneNode(true);
            this.appendChild(clone);
            draggedItem.remove();
            let input = document.createElement("input");
            input.type = "hidden";
            input.name = "jawaban[" + this.dataset.target.split('-')[0] + "][]";
            input.value = draggedItem.dataset.value;
            this.appendChild(input);
            let jawabanBenar = @json($jawabanBenar);
            let jawabanUser = input.value;
            let isBenar = jawabanUser == jawabanBenar[idx];
            // Putar audio berdasarkan benar/salah
            let audio = new Audio(isBenar ? '{{ asset("/user/audio/benar.mp3") }}' :
                '{{ asset("/user/audio/salah.mp3") }}');
            audio.play();
            let targetModal = new bootstrap.Modal(
                document.getElementById(isBenar ? 'modalBenar' : 'modalSalah')
            );
            targetModal.show();
            sudahDrop++;
            if (sudahDrop === jumlahDrop) {
                document
                    .getElementById(isBenar ? 'modalBenar' : 'modalSalah')
                    .addEventListener('hidden.bs.modal', function() {
                        form.submit();
                    }, {
                        once: true
                    });
            }
        });
    });
});
</script>



@endsection
