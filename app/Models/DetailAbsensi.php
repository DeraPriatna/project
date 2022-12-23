<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Absensi;
use App\Models\Mahasiswa;

class DetailAbsensi extends Model
{
    use HasFactory;

    protected $table = 'detail_absensi';

    protected $fillable = ['absensi_id','kelas_id','mahasiswa_id','ket'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }
    
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])
            ->translatedFormat('H:i');
    }

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
