@extends('pages.user.soal.wrapper-selesai')
@section('render')

<div class="level-selesai-page text-center">

    <div class="modal-dialog modal-dialog-centered" style="max-width: 600px; margin: 50px auto;">
        <div class="modal-content skor-modal">

            <div class="modal-body text-center">

                <!-- Gambar anak -->
                <div class="modal-image-wrapper">
                    <img src="{{ asset('user/image/' . $bannerImage) }}" alt="Banner Image" class="modal-image">
                </div>

                <div class="banner">
                    <span class="banner-title">{{ $bannerTitle }}</span>
                </div>

                <p class="subjudul">Level {{ $levelId }}</p>

                <!-- Bintang -->
                <div class="stars-wrapper mb-3">
                    @for($i = 1; $i <= 3; $i++)
                        @php
                            $starColor = $i <= $stars ? 'gold' : 'white';
                            $starPositionClass = $i == 2 ? 'star-middle' : '';
                        @endphp
                        <i class="fas fa-star {{ $starPositionClass }} star" style="color: {{ $starColor }};"></i>
                    @endfor
                </div>

                <div class="list-skor text-start">
                    @php
                        $soalIds = $levels->firstWhere('id', $levelId)->soal->pluck('id');
                        $jawabanUserPerLevel = \App\Models\JawabanUserModel::where('user_id', auth()->id())
                                                    ->whereIn('soal_id', $soalIds)
                                                    ->get()
                                                    ->keyBy('soal_id');
                        $totalSkor = 0;
                    @endphp

                    @foreach($levels->firstWhere('id', $levelId)->soal as $soal)
                        @php
                            $score = $jawabanUserPerLevel->get($soal->id)->score ?? 0;
                            $totalSkor += $score;
                        @endphp
                        <p>SOAL {{ $loop->iteration }} = {{ $score }}</p>
                    @endforeach
                </div>

                <h4 class="total-skor">Jumlah Skor: {{ $totalSkor }}</h4>


                <div class="d-flex justify-content-center gap-3 mt-4">
                    <form action="{{ route('user.level.reset', ['level' => $levelId]) }}" method="POST" style="margin-top:15px">
                        @csrf
                        <button type="submit" class="btn-reset">
                            <i class="fas fa-undo"></i>
                        </button>
                    </form>
                    <a href="{{ route('user.pilih-level.index') }}">
                        <button class="btn-home">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
