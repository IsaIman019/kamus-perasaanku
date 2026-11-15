@extends('layouts.app-user')
@section('title', 'Soal')
@push('styles')
<link href="{{ asset('user/css/custom-css/soal.css') }}" rel="stylesheet">
@endpush
@php
    $hideNavbar = true;
@endphp


@section('content')
<div class="soal" style="background: {{ $soal->background_color }}">
    <img src="{{ asset('/user/image/bg.png') }}" alt="ellipse background" class="ellipse-bg">

        <div class="top-bar">
            <button class="btn-gotohome" onclick="window.location='{{ route('user.pilih-level.index') }}'">
                <i class="fas fa-arrow-left"></i>
            </button>

            <div class="level-mini active">
                <span class="level-label text-bold">Level {{ $level->id }}</span>
                @php
                    $jawabanUser = \App\Models\JawabanUserModel::where('user_id', auth()->id())
                                    ->whereIn('soal_id', $level->soal->pluck('id'))
                                    ->where('is_answered', true)
                                    ->pluck('soal_id')
                                    ->toArray();
                @endphp

                <div class="bulatan-wrapper">
                    @foreach($level->soal as $soal)
                        <div class="bulatan {{ in_array($soal->id, $jawabanUser) ? 'filled' : '' }}">
                            @if(in_array($soal->id, $jawabanUser))
                                <i class="fas fa-check text-white"></i> {{-- icon centang --}}
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    
    


    <div class="ellipse-content">
        @yield('render')
        
    </div>
</div>
<div class="modal fade" id="modalBenar" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered text-center">
                <div class="modal-content p-4">
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                <img src="{{ asset('/user/image/yey-benar.png') }}" class="img-fluid" alt="Benar">
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalSalah" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered text-center">
                <div class="modal-content p-4">
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                <img src="{{ asset('/user/image/yah-salah.png') }}" class="img-fluid" alt="Salah">
                </div>
            </div>
        </div>
@endsection
