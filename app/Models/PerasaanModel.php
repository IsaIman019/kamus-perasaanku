<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerasaanModel extends Model
{
    use HasFactory;

    protected $table = 'master_perasaan';

    protected $guarded = ['id'];
}
