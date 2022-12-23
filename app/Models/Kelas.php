<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\Anggota;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = ['matkul_id','dosen_id','hari','waktu','thn_akademik','status'];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
