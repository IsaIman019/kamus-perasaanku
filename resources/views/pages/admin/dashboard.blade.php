@extends('layouts.app-admin')
@section('title', 'Dashboard Admin')
@section('content')
<div class="container-fluid p-4">
    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>Total Users</h5>
                <h2>{{ $totalUsers }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>Total Levels</h5>
                <h2>{{ $totalLevels }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>Total Soal</h5>
                <h2>{{ $totalSoal }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>Jawaban Hari Ini</h5>
                <h2>{{ $jawabanHariIni }}</h2>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Aktivitas Terbaru</h4>
    <div class="list-group">
        @forelse($recentActivity as $act)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $act->user->name }}</strong> submit soal 
                    <strong>{{ $act->soal->judul }}</strong>
                </div>
                <small>{{ $act->created_at->diffForHumans() }}</small>
            </div>
        @empty
            <div class="list-group-item">Belum ada aktivitas terbaru.</div>
        @endforelse
    </div>
</div>
@endsection
