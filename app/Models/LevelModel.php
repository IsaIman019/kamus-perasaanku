<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'master_level';

    protected $guarded = ['id'];

    public function soal()
    {
        return $this->hasMany(SoalModel::class, 'level_id', 'id');
    }
    
    public function skorUsers()
    {
        return $this->hasMany(SkorUserModel::class, 'level_id');
    }
}
