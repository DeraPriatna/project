<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Tugas;
use App\Models\Mahasiswa;

class DetailTugas extends Model
{
    use HasFactory;

    protected $table = 'detail_tugas';

    protected $fillable = ['tugas_id','mahasiswa_id','file','nilai'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('d F y, H:i');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
