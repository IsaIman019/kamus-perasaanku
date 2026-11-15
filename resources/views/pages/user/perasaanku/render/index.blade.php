@extends('pages.user.perasaanku.wrapper')
@section('render')

<div class="text-center">
    <div class="judul-wrapper">
        <h2 class="judul mb-5">MARI MENGENAL EMOSIMU!</h2>
    </div>

    <div class="d-flex justify-content-center flex-wrap gap-4 w-100">
        @foreach($perasaanku as $perasaan)
        @php
        $warna = match(strtolower($perasaan->nama)) {
        'senang' => '#9bc37b',
        'marah' => '#f37349',
        'takut' => '#ffe766',
        'sedih' => '#7ba3df',
        default => '#cccccc'
        };
        @endphp

        <a href="{{ route('user.emosiku.show', $perasaan->id) }}" class="card-link">
            <div class="card-perasaan" style="background-color: {{ $warna }}"
                data-audio="{{ $perasaan->audio ? asset('storage/' . $perasaan->audio) : '' }}">
                <div class="img-wrapper">
                    <img src="{{ asset('storage/'.$perasaan->gambar) }}" alt="{{ $perasaan->nama }}">
                </div>
                <h4>{{ $perasaan->nama }}</h4>
            </div>

        </a>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
document.querySelectorAll('.card-perasaan').forEach(card => {
    const audioSrc = card.dataset.audio;
    let audio = null;

    if (audioSrc) {
        audio = new Audio(audioSrc);
    }

    card.addEventListener('mouseenter', () => {
        if (audio) {
            audio.currentTime = 0;
            audio.play();
        }
    });

    card.addEventListener('mouseleave', () => {
        if (audio) {
            audio.pause();
            audio.currentTime = 0;
        }
    });
});
</script>
@endpush

@endsection
