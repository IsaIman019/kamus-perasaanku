@extends('layouts.app-user')
@section('title', 'Login')
@section('content')
<div class="ellipse-wrapper">
    <img src="{{ asset('/user/image/bg.png') }}" alt="ellipse background" class="ellipse-bg">
    <img src="{{ asset('/user/image/two-child.png') }}" alt="two child" class="two-child">

    <div class="title-wrapper">
        <img src="{{ asset('/user/image/Logo.png') }}" alt="Mengenal Perasaanku" class="logo-title">
    </div>

    <div class="ellipse-content">
        <div class="login-text">Login</div>
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <div class="form-group">
                <input id="email" type="email" name="email" class="input-field" placeholder="Masukkan Email Anda" required>
            </div>

            <div class="form-group">
                <input id="password" type="password" name="password" class="input-field" placeholder="Masukkan Password Anda" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn-login">Login</button>
            </div>
        </form>
        <div class="footer-text mt-2 mb-5">Belum Punya Akun? <a href="{{'register'}}">Daftar Disini</a></div>
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
    * {
        box-sizing: border-box;
    }
    body {
        background-color: #ffa098 !important;
        margin: 0;
        padding: 0;
        overflow-x: hidden !important;
    }
    .title-svg {
        width: 100%;
        height: 300px;
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
        overflow: hidden;
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
        width: 1500px; 
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
        max-width: 400px;
        text-align: center;
        z-index: 2;
        margin-top: 0px;
    }
    .ellipse-content .login-text{
        font-family: 'Negrita Pro', sans-serif;
        font-size: 30px;
        font-weight: 900;
        color: #894864;
        -webkit-text-stroke: 2px #ffbcd9;
        line-height: 1.1;
        margin: -100px 0px 24px 0px;
        stroke-width: 12px;
        paint-order: stroke fill;
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

    .btn-login {
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

    .btn-login:hover {
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

        

        .ellipse-wrapper .ellipse-content {
            width: 90%;
            margin: 20px auto 10px auto; /* biar center & ada jarak */
            text-align: center;
        }

        .ellipse-wrapper .two-child {
            display: none;
        }
        .ellipse-content .login-text {
            font-size: 22px;
            margin: 20px 0; /* hilangkan margin negatif */
        }
        .ellipse-content .btn-login {
            width: 100%;
            max-width: 100%;
            padding: 12px;
            font-size: 1rem;
            border-radius: 10px;
        }
        .ellipse-content .footer-text {
            font-size: 14px;
            margin-top: 15px;
            text-align: center;   /* biar center */
        }
        .ellipse-wrapper .two-child {
            display: none;
        }
    }
</style>
@endpush
