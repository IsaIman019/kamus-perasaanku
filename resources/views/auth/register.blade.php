@extends('layouts.app-user')
@section('title', 'Register')
@section('content')
<div class="ellipse-wrapper">
    <!-- Background ellipse -->
    <img src="{{ asset('/user/image/bg.png') }}" alt="ellipse background" class="ellipse-bg">
    <!-- Children image -->
    <img src="{{ asset('/user/image/two-child.png') }}" alt="two child" class="two-child">

    <div class="title-wrapper">
        <img src="{{ asset('/user/image/Logo.png') }}" alt="Mengenal Perasaanku" class="logo-title">
    </div>


    
    <!-- Register Form -->
    <div class="ellipse-content mt-5 mb-5">
        <div class="register-text">Register</div>
        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <input id="name" type="text" name="name" class="input-field" placeholder="Masukkan Nama Anda" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="email" type="email" name="email" class="input-field" placeholder="Masukkan Email Anda" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <input id="password" type="password" name="password" class="input-field" placeholder="Masukkan Password Anda" required>
                    @error('password')
                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" name="password_confirmation" class="input-field" placeholder="Konfirmasi Password" required>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-register">Register</button>
            </div>
        </form>
        <div class="footer-text mt-2">Sudah Punya Akun? <a href="{{ route('login') }}">Login Disini</a></div>
    </div>
</div>
@endsection
@push('styles')
<style>
    @font-face {
            font-family: 'Negrita Pro';
            src: url('/user/font/negrita-pro/NegritaPro.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

    @font-face {
            font-family: 'Negrita Pro Bold';
            src: url('/user/font/negrita-pro/NegritaPro-Bold.ttf') format('truetype');
            font-weight: bold;
            font-style: normal;
    }
    /* Terapkan ke semua elemen */
    * {
        box-sizing: border-box;
    }
    body {
        background-color: #ffa098 !important;
        margin: 0;
        padding: 0;
        overflow-x: hidden !important;
    }
    
    .ellipse-wrapper {
        position: relative;
        width: 100%;
        min-height: 100vh;
        display: flex;
        flex-direction: column; /* atur susunan vertikal */
        align-items: center;
        justify-content: flex-start;
        padding-top: 40px; /* kasih jarak dari atas */
        overflow-x: hidden;
    }
    .ellipse-wrapper .ellipse-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }
    .ellipse-wrapper .two-child {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        max-width: 100%;
        z-index: 1;
        height: auto;
    }
    .ellipse-wrapper .title-wrapper {
        width: 100%;
        text-align: center;
        z-index: 2;
        margin-bottom: 20px;
        
    }

    
    .logo-title {
        width: 1200px;       /* default desktop */
        max-width: 100%;     /* biar responsif */
        height: auto;
        display: block;
        margin: 0 auto;
    
    }
    .ellipse-wrapper .ellipse-content {
        width: 100%;
        max-width: 600px;
        text-align: center;
        z-index: 2;
        margin-top: 0px;
    }
    .ellipse-content .register-text{
        font-family: 'Negrita Pro', sans-serif;
        font-size: 30px;
        font-weight: 900;
        color: #894864;
        -webkit-text-stroke: 2px #ffbcd9;
        line-height: 1.1;
        margin: -150px 0px 24px 0px;
        stroke-width: 12px;
        paint-order: stroke fill;
    }
    .ellipse-content .form-row {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }

    .ellipse-content .form-row .form-group {
        flex: 1; /* bagi rata */
    }
    .ellipse-content .input-field {
        background: #fff;
        border: 3px solid #000;
        border-radius: 12px;
        padding: 14px;
        width: 100%;
        margin: 10px 0;
        font-size: 1.1rem;
        font-weight: 500;
    }

    .btn-register {
        background: #fff;
        border: 3px solid #000;
        color: #000;
        padding: 14px;
        border-radius: 16px;
        cursor: pointer;
        width: 100%;
        margin-top: 15px;
        font-weight: 700;
        font-size: 1.3rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-register:hover {
        background: #f5f5f5b2;
        transform: translateY(-5%);
    }
    @media (max-width: 992px) {
        .logo-title {
                width: 400px;
                max-width: 85%;
            }

        .ellipse-wrapper .ellipse-content {
            top: 35%;
            width: 85%;
        }
    }

@media (max-width: 576px) {
    .ellipse-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center; /* ✅ center vertikal */
        align-items: center;
        min-height: 100vh;       /* ✅ penuh layar */
        padding-top: 0;     
    }

     .logo-title {
            width: 1000px;
            max-width: 100%;
        }


    /* Form container */
    .ellipse-wrapper .ellipse-content {
        width: 90%;
        margin: 20px auto 10px auto; /* biar center & ada jarak */
        text-align: center;
    }

    /* Teks Register */
    .ellipse-content .register-text {
        font-size: 22px;
        margin: 20px 0; /* hilangkan margin negatif */
    }

    /* Input field */
    .ellipse-content .input-field {
        width: 100%;          /* biar sesuai container */
        max-width: 100%;      /* cegah tembus layar */
        padding: 10px;
        font-size: 0.95rem;
        border-radius: 8px;
    }

    /* Button */
    .ellipse-content .btn-register {
        width: 100%;
        max-width: 100%;
        padding: 12px;
        font-size: 1rem;
        border-radius: 10px;
    }

    /* Row jadi kolom */
    .ellipse-content .form-row {
        flex-direction: column;
        flex-wrap: wrap;
        gap: 10px;
    }

    /* Footer text */
    .ellipse-content .footer-text {
        font-size: 14px;
        margin-top: 15px;
        text-align: center;   /* biar center */
    }

    /* Hilangkan anak di bawah */
    .ellipse-wrapper .two-child {
        display: none;
    }
}
</style>
@endpush
