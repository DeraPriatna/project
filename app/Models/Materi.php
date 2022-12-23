<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    protected $fillable = ['judul','deskripsi','file','kelas_id'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('j M y');
    }
}
