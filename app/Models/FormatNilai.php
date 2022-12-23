<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class FormatNilai extends Model
{
    use HasFactory;

    protected $table = 'format_nilai';
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
