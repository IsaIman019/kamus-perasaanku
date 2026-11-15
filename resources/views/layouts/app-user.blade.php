<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kamus Perasaanku - @yield('title')</title>
    <meta name="description" content="@yield('description', 'Kamus Perasaanku membantu kamu memahami perasaanmu melalui kamus interaktif.')">
    <meta name="keywords" content="kamusperasaanku, kamus perasaanku, KamusPerasaanku, Kamus Perasaanku, game kamus perasaan, game kamus perasaanku, game kamusperasaanku, bermain game perasaan, kamus perasaan, psikologi, emosi, self-help, perasaan">
    <meta property="og:title" content="@yield('title', 'Kamus Perasaanku')">
    <meta property="og:description" content="@yield('description', 'Kamus Perasaanku membantu kamu memahami perasaanmu melalui kamus interaktif.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-image.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Kamus Perasaanku')">
    <meta name="twitter:description" content="@yield('description', 'Kamus Perasaanku membantu kamu memahami perasaanmu melalui kamus interaktif.')">
    <meta name="twitter:image" content="{{ asset('images/og-image.png') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @stack('styles')
</head>
<body>
    <div id="app">


        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
