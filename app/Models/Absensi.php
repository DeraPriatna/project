<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Kelas;
use App\Models\DetailAbsensi;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = ['kelas_id','pertemuan','status'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function detailAbsensi()
    {
        return $this->hasMany(DetailAbsensi::class);
    }
}
