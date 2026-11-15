@extends('pages.user.perasaanku.wrapper')
@section('title', 'show-emosiku')

@push('styles')
<link href="{{ asset('user/css/custom-css/perasaanku.css') }}" rel="stylesheet">
@endpush

@section('render')

@php
$warna = match(strtolower($perasaan->nama)) {
    'senang' => '#9bc37b',
    'marah'  => '#f37349',
    'takut'  => '#ffc107',
    'sedih'  => '#7ba3df',
    default  => '#cccccc'
};

$textColor = '#ffffff';
$judulColor = '#e56543';
$listColor = '#333333';
$imageReal = asset('storage/'.$perasaan->gambar_real);
@endphp

<div class="container" style="min-height: 80vh;">

    {{-- Tombol Back --}}
    <button class="btn-gotohome" id="btnBackShow"
        onclick="history.back()"
        style="left: 20px;  ">
        <i class="fas fa-arrow-left"></i>
    </button>

    {{-- Judul --}}
    <div class="text-center ">
        <h1 class="display-4 font-weight-bold mb-2"
            style="color: {{ $judulColor }}; font-family: 'Playpen Sans', sans-serif;">
            {{ strtoupper($perasaan->nama) }}
        </h1>

        <h3 style="color: {{ $judulColor }}; font-family: 'Playpen Sans', sans-serif;">
            Bagaimana ekspresi {{ strtolower($perasaan->nama) }}?
        </h3>
    </div>

    {{-- KONTEN UTAMA — Gambar Kiri & Deskripsi Kanan --}}
    <div class="w-100 d-flex justify-content-center">
        <div class="d-flex flex-column flex-md-row align-items-start gap-4"
            style="max-width: 900px; width: 100%;">

            {{-- GAMBAR --}}
            <div class="text-center flex-shrink-0" style="width: 100%; max-width: 350px;">
                <img src="{{ $imageReal }}" alt="Ekspresi"
                    class="img-fluid"
                    style="max-height: 300px;">
            </div>

            {{-- DESKRIPSI --}}
            <div class="flex-grow-1" style="min-width: 280px;">

                {{-- CARD PUTIH --}}
                <div style="
                    background: #ffffff;
                    padding: 20px 22px;
                    border-radius: 12px;
                    box-shadow: 0px 3px 8px rgba(0,0,0,0.1);
                ">

                    @php
                        $keterangan_list = explode("\n", $perasaan->keterangan1);
                    @endphp

                    <ul class="list-unstyled"
                        style="font-size: 1.15rem; font-weight: bold; line-height: 1.8;
                            color: {{ $listColor }}; text-align: justify; margin-bottom: 0;">
                        @foreach($keterangan_list as $poin)
                            <li>{{ $poin }}</li>
                        @endforeach
                    </ul>

                </div>

            </div>

        </div>
    </div>

    <div class="text-center mt-4">
        <h3 style="color: {{ $judulColor }}; font-family: 'Playpen Sans', sans-serif;">
            Kapan aku merasa {{ strtolower($perasaan->nama) }}?
        </h3>
    </div>

    {{-- BAGIAN BAWAH --}}
    <div class="w-100 d-flex justify-content-center">
        <div class="d-flex flex-column flex-md-row align-items-start gap-4"
            style="max-width: 900px; width: 100%;">

            <div class="flex-grow-1" style="min-width: 280px;">

                {{-- CARD PUTIH --}}
                <div style="
                    background: #ffffff;
                    padding: 20px 22px;
                    border-radius: 12px;
                    box-shadow: 0px 3px 8px rgba(0,0,0,0.1);
                ">

                    @php
                        $keterangan_list = explode("\n", $perasaan->keterangan2);
                    @endphp

                    <ul class="list-unstyled"
                        style="font-size: 1.15rem; font-weight: bold; line-height: 1.8;
                            color: {{ $listColor }}; text-align: justify; margin-bottom: 0;">
                        @foreach($keterangan_list as $poin)
                            <li>{{ $poin }}</li>
                        @endforeach
                    </ul>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    const homeBtn = document.querySelector('.perasaanku .btn-gotohome'); 
    const backBtn = document.getElementById('btnBackShow');

    if (homeBtn && backBtn && homeBtn !== backBtn) {
        homeBtn.style.display = 'none';
    }
});
</script>
@endpush

