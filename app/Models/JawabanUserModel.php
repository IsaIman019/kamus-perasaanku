<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanUserModel extends Model
{
    use HasFactory;

    protected $table = 'jawaban_user';

    protected $guarded = ['id'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Soal
    public function soal()
    {
        return $this->belongsTo(SoalModel::class, 'soal_id');
    }
}
