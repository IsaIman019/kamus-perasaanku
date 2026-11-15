<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JawabanUserModel;
use App\Models\LevelModel;
use App\Models\PerasaanModel;
use App\Models\SkorUserModel;
use App\Models\SoalModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoalController extends Controller
{
    public function showSoal($levelId, $soalId)
    {
        $level = LevelModel::findOrFail($levelId);
        $soal  = $level->soal()->where('id', $soalId)->firstOrFail();

        $userId = Auth::id();
        if ($level->id > 1) {
            $prevLevel = LevelModel::find($level->id - 1);
            $prevLevelDone = SkorUserModel::where('user_id', $userId)
                                ->where('level_id', $prevLevel->id)
                                ->where('status', 'done')
                                ->exists();

            if (!$prevLevelDone) {
                return redirect()->route('user.pilih-level.index')
                                ->with('warning', 'Level sebelumnya harus diselesaikan terlebih dahulu!');
            }
        }
        $jawabanUser = JawabanUserModel::where('user_id', $userId)
                            ->whereIn('soal_id', $level->soal->pluck('id'))
                            ->get();

        $nextSoal = $level->soal->firstWhere(function($s) use ($jawabanUser) {
            $answered = $jawabanUser->firstWhere('soal_id', $s->id)?->is_answered ?? false;
            return !$answered;
        });
        if($nextSoal && $nextSoal->id != $soalId){
            return redirect()->route('user.level.soal', [$level->id, $nextSoal->id]);
        }

        $perasaan = PerasaanModel::all();
        $skorUser = SkorUserModel::where('user_id', $userId)->get();

        return view('pages.user.soal.render.index', compact('level', 'soal', 'perasaan', 'skorUser'));
    }

    public function submitSoal(Request $request, $levelId, $soalId)
    {
        $userId = Auth::id();
        $level = LevelModel::findOrFail($levelId);
        $soal  = $level->soal()->where('id', $soalId)->firstOrFail();

        $jawabanUserInput = $request->input('jawaban')[$soalId] ?? [];
        $jawabanBenar = is_array($soal->jawaban_benar) 
                        ? $soal->jawaban_benar 
                        : json_decode($soal->jawaban_benar, true);
        $skor = 0;
        if ($level->id == 1) {
            foreach ($jawabanUserInput as $idx => $val) {
                if (isset($jawabanBenar[$idx]) && $jawabanBenar[$idx] == $val) {
                    $skor += 25;
                }
            }
        } else {
            if (isset($jawabanUserInput[0]) && $jawabanUserInput[0] == $jawabanBenar[0]) {
                $skor = 100;
            }
        }

        JawabanUserModel::updateOrCreate(
            ['user_id' => $userId, 'soal_id' => $soalId],
            [
                'jawaban' => json_encode($jawabanUserInput),
                'is_answered' => true,
                'score' => $skor
            ]
        );
        $soalIds = $level->soal->pluck('id');
        $totalSkor = JawabanUserModel::where('user_id', $userId)
                        ->whereIn('soal_id', $soalIds)
                        ->sum('score');
        $allDone = JawabanUserModel::where('user_id', $userId)
                        ->whereIn('soal_id', $soalIds)
                        ->where('is_answered', false)
                        ->doesntExist();

        SkorUserModel::updateOrCreate(
            ['user_id' => $userId, 'level_id' => $levelId],
            [
                'score' => $totalSkor,
                'status' => $allDone ? 'done' : 'in_progress'
            ]
        );
        $lastSoalId = $level->soal->last()->id;
        if ($soalId == $lastSoalId) {
            return redirect()->route('user.level.selesai', $levelId);
        }
        $soalIdsUserDone = JawabanUserModel::where('user_id', $userId)
                            ->whereIn('soal_id', $soalIds)
                            ->where('is_answered', true)
                            ->pluck('soal_id')->toArray();

        $nextSoal = $level->soal->first(function($s) use ($soalIdsUserDone) {
            return !in_array($s->id, $soalIdsUserDone);
        });

        if ($nextSoal) {
            return redirect()->route('user.level.soal', [$levelId, $nextSoal->id]);
        }
        return redirect()->route('user.pilih-level.index');
    }


    public function levelSelesai($levelId)
    {
        $userId = Auth::id();
        $levels = LevelModel::orderBy('id')->get();
        $level = LevelModel::with('soal')->findOrFail($levelId);
        $skorUserCollection = SkorUserModel::where('user_id', $userId)
                                ->get()
                                ->keyBy('level_id'); 
        $skorUser = $skorUserCollection->get($levelId);

        if (!$skorUser || $skorUser->status !== 'done') {
            return redirect()->route('user.pilih-level.index')
                            ->with('warning', 'Level belum selesai!');
        }

        $soal = (object)[
            'background_color' => '#8db4ad'
        ];

        $score = $skorUser->score;
        if($levelId == 1){
            if($score <= 100){
                $bannerTitle = "COBA LAGI";
                $bannerImage = "child-cry.png";
            } elseif($score == 150){
                $bannerTitle = "SEDIKIT LAGI";
                $bannerImage = "child-women.png";
            } else { 
                $bannerTitle = "KERJA BAGUS";
                $bannerImage = "two-child.png";
            }

            if($score < 150) $stars = 1;
            elseif($score < 200) $stars = 2;
            else $stars = 3;
        } else { 
            if($score <= 200){
                $bannerTitle = "COBA LAGI";
                $bannerImage = "child-cry.png";
            } elseif($score == 300){
                $bannerTitle = "SEDIKIT LAGI";
                $bannerImage = "child-women.png";
            } else { // 400
                $bannerTitle = "KERJA BAGUS";
                $bannerImage = "two-child.png";
            }
            if($score < 300) $stars = 1;
            elseif($score < 400) $stars = 2;
            else $stars = 3;
        }

        return view('pages.user.soal.render.level-selesai', compact(
            'levels', 'skorUserCollection', 'levelId', 'soal', 'bannerTitle', 'bannerImage', 'stars'
        ));
    }


    public function resetLevel(Request $request, $levelId)
    {
        $userId = Auth::id();
        $level = LevelModel::with('soal')->findOrFail($levelId);
         $levelSoalIds = $level->soal->pluck('id'); 
        JawabanUserModel::where('user_id', $userId)
            ->whereIn('soal_id', $levelSoalIds)
            ->delete();
        SkorUserModel::where('user_id', $userId)
            ->where('level_id', $levelId)
            ->update(['score' => 0, 'status' => 'in_progress']);

        return redirect()->route('user.pilih-level.index', [$levelId, $level->soal->first()->id]);
    }




}
