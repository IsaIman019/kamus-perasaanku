@extends('layouts.app-user')
@section('title', 'Pilih Level')
@push('styles')
<link href="{{ asset('user/css/custom-css/pilih-level.css') }}" rel="stylesheet">
@endpush
@php
    $hideNavbar = true;
@endphp

@section('content')
<div class="pilih-level" style="background-color:#e76647 !important">
    <img src="{{ asset('/user/image/bg.png') }}" alt="ellipse background" class="ellipse-bg">
    <button class="btn-gotohome" onclick="window.location='{{ route('user.home.index') }}'">
         <i class="fas fa-home"></i>
    </button>
    
<div class="modal fade" id="lihatSkorModal" tabindex="-1" aria-labelledby="lihatSkorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content skor-modal">
            <div class="modal-body text-center">

                <!-- Gambar anak di atas modal -->
                <div class="modal-image-wrapper">
                    <img src="{{ asset('user/image/two-child.png') }}" alt="Two Child" class="modal-image">
                </div>

                <div class="banner">
                    <span class="banner-title">KERJA BAGUS</span>
                </div>
                <p class="subjudul">SKOR AKHIR</p>

                <div class="list-skor text-start">
                    @foreach($levels as $level)
                        @php
                            $score = $skorUser->get($level->id)->score ?? 0;
                        @endphp
                        <p>LEVEL {{ $level->id }} = {{ $score }}</p>
                    @endforeach
                </div>

                <h4 class="total-skor">Jumlah Skor: {{ $totalSkor }}</h4>

                <!-- Tombol home & reset -->
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="{{ route('user.pilih-level.index') }}">
                        <button class="btn-close-modal">
                            <i class="fas fa-times"></i>
                        </button>
                    </a>
                    <a href="{{ route('user.home.index') }}">
                        <button class="btn-home">
                            <i class="fas fa-home"></i>
                        </button>
                    </a>

                    <form action="{{ route('user.reset-semua-level') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-reset">
                            <i class="fas fa-undo"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="ellipse-content">
        @yield('render')
    </div>
</div>
@endsection
