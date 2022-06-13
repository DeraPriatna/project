<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class AbsensiController extends Controller
{
    public function index($id)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.dosen.absensi.index',compact('kelas'));
    }
}
