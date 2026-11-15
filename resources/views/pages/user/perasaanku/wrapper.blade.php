@extends('layouts.app-user')
@section('title', 'Emosiku')
@push('styles')
<link href="{{ asset('user/css/custom-css/perasaanku.css') }}" rel="stylesheet">
@endpush
@php
$hideNavbar = true;
@endphp

@section('content')
<div class="perasaanku" style="background-color:#894864 !important">
    <img src="{{ asset('/user/image/bg.png') }}" alt="ellipse background" class="ellipse-bg">
    <button class="btn-gotohome" onclick="window.location='{{ route('user.home.index') }}'">
        <i class="fas fa-home"></i>
    </button>

    <div class="ellipse-content">
        @yield('render')
    </div>
</div>
@endsection