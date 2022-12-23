<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Kelas;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = ['judul','petunjuk','file','tenggat','kelas_id','status'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('j M y');
    }

    public function getTenggatAttribute()
    {
        return Carbon::parse($this->attributes['tenggat'])
            ->translatedFormat('l, d F y');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
