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
            <button class="btn-gotohome" onclick="window.location='{{ route('user.home.index') }}'">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>

    <div class="ellipse-content">
        @yield('render')
    </div>
</div>
@endsection
