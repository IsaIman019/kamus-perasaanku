<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalModel extends Model
{
    use HasFactory;
    protected $table = 'master_soal';
    protected $guarded = ['id'];

    protected $casts = [
        'jawaban_benar' => 'array',
    ];

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id');
    }
    public function jawabanUsers()
    {
        return $this->hasMany(JawabanUserModel::class, 'soal_id');
    }
}
