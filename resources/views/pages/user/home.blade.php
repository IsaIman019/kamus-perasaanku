@extends('layouts.app-user')
@section('title', 'Home')
@section('content')
<div class="home">
    <img src="{{ asset('/user/image/bg.png') }}" alt="ellipse background" class="ellipse-bg">
    <img src="{{ asset('/user/image/two-child.png') }}" alt="two child" class="two-child">

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn-logout">
            <i class="fas fa-sign-out-alt"></i>
        </button>
    </form>

    <div class="title-wrapper">
        <img src="{{ asset('/user/image/Logo.png') }}" alt="Mengenal Perasaanku" class="logo-title">
    </div>

    <div class="ellipse-content">
        <div class="form-group">
            <a href="{{route('user.pilih-level.index')}}"><button class="btn-onhome">Bermain</button></a>
            <a href="{{route('user.emosiku.index')}}"><button class="btn-onhome">Emosiku</button></a>
        </div>
    </div>
</div>

@endsection
