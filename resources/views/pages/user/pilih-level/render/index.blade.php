@extends('pages.user.pilih-level.wrapper') 
@section('render')

<div class="text-center">
    <div class="judul-wrapper">
        <h2 class="judul mb-5">AYO BERMAIN!</h2>
    </div>

    <div class="d-flex justify-content-center flex-column align-items-center gap-4 w-100">
        @php $allFinished = true; @endphp
        
        @foreach($levels as $level)
        
            @php
                $userScore = \App\Models\SkorUserModel::where('user_id', auth()->id())
                    ->where('level_id', $level->id)
                    ->first();

                // Ambil jawaban user level sebelumnya
                $prevLevelSoalIds = \App\Models\SoalModel::where('level_id', $level->id - 1)->pluck('id');
                $prevJawabanCount = \App\Models\JawabanUserModel::where('user_id', auth()->id())
                                        ->whereIn('soal_id', $prevLevelSoalIds)
                                        ->where('is_answered', true)
                                        ->count();

                // Ambil skor level sebelumnya
                $prevScore = \App\Models\SkorUserModel::where('user_id', Auth::id())
                                ->where('level_id', $level->id - 1)
                                ->first();

                // Ambil jawaban user per level
                $jawabanUser = \App\Models\JawabanUserModel::where('user_id', auth()->id())
                                ->whereIn('soal_id', $level->soal->pluck('id'))
                                ->get();

                $firstUnanswered = $level->soal->firstWhere(function($s) use ($jawabanUser) {
                    return !$jawabanUser->firstWhere('soal_id', $s->id)?->is_answered;
                });

                $firstUnansweredId = $firstUnanswered ? $firstUnanswered->id : $level->soal->first()->id;
                $totalSoal = count($level->soal);
                $jawabanCount = $jawabanUser->where('is_answered', true)->count();

                // --- STATUS LEVEL LOGIC ---
                if($level->id > 1 && $prevJawabanCount < $prevLevelSoalIds->count()) {
                    $statusLevel = 'locked'; // Belum unlock karena soal sebelumnya belum dijawab semua
                } 
                // 🔒 tambahan aturan skor minimal
                elseif($level->id == 2 && (!$prevScore || $prevScore->score <= 100)) {
                    $statusLevel = 'locked';
                }
                elseif($level->id == 3 && (!$prevScore || $prevScore->score <= 200)) {
                    $statusLevel = 'locked';
                }
                elseif($userScore && $userScore->status === 'done'){
                    $statusLevel = 'finished'; // Sudah selesai, tapi bisa klik ke level.selesai
                } else {
                    $statusLevel = 'unlocked'; // Bisa klik normal
                }

                // Cek semua selesai
                if ($jawabanCount < $totalSoal) {
                    $allFinished = false;
                }
            @endphp


            <div class="level-card {{ $statusLevel }}">
                <div class="level-content">
                    <span class="level-label">Level {{ $level->id }}</span>

                    <div class="bulatan-wrapper">
                        @for($i = 1; $i <= $totalSoal; $i++)
                            <div class="bulatan {{ $jawabanCount >= $i ? 'filled' : '' }}">
                                @if($jawabanCount >= $i)
                                    <i class="fas fa-check"></i>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>

                @if($statusLevel === 'locked')
                    <div class="lock-overlay">
                        <i class="fas fa-lock"></i>
                    </div>
                @elseif($statusLevel === 'unlocked')
                    <a href="{{ route('user.level.soal', ['level' => $level->id, 'soal' => $firstUnansweredId]) }}" class="level-link"></a>
                @elseif($statusLevel === 'finished')
                    <a href="{{ route('user.level.selesai', ['level' => $level->id]) }}" class="level-link"></a>
                @endif
                {{-- disabled tidak perlu overlay / link --}}
            </div>


        @endforeach

        @if($allFinished)
            <button class="btn-lihat-skor" data-bs-toggle="modal" data-bs-target="#lihatSkorModal">
                Lihat Skor
            </button>
        @endif
    </div>
</div>

@if(session('warning'))
<div class="modal fade" id="warningModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Peringatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        {{ session('warning') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var warningModalEl = document.getElementById('warningModal');
    if(warningModalEl){
        var warningModal = new bootstrap.Modal(warningModalEl);
        warningModal.show();
    }
});
</script>
@endif

@endsection
