<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class Forum extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'forum';

    protected $fillable = ['judul','slug','konten','mahasiswa_id','dosen_id','kelas_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

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
