<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class Forum extends Model
{
    use HasFactory;

    protected $table = 'forum';

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
}
