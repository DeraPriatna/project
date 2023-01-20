<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\FormatNilai;
use App\Models\Anggota;
use App\Models\Absensi;
use App\Models\DetailAbsensi;
use App\Models\Tugas;
use App\Models\DetailTugas;

class NilaiController extends Controller
{
    public function index($route, Kelas $kelas)
    {
        $format_nilai = FormatNilai::all()->where('kelas_id',$kelas->id);
        $anggota = Anggota::select('*')->where('kelas_id',$kelas->id)->orderBy('mahasiswa_id')->get();
        $absensi = Absensi::all()->where('kelas_id',$kelas->id);
        $d_absensi = DetailAbsensi::all()->where('ket','!=','x');
        $tugas = Tugas::all()->where('kelas_id',$kelas->id);
        $d_tugas = DetailTugas::all();
        return view('e_learning.dosen.nilai.index',compact('route','kelas','format_nilai','anggota','absensi','d_absensi','tugas','d_tugas'));
    }

    public function index_mhs($route, Kelas $kelas)
    {
        $tugas = Tugas::all()->where('kelas_id',$kelas->id);
        $d_tugas = DetailTugas::all();
        return view('e_learning.mahasiswa.nilai.index',compact('route','kelas','tugas','d_tugas'));
    }

    public function create($route, Kelas $kelas)
    {
        return view('e_learning.dosen.nilai.create',compact('route','kelas'));
    }

    public function store(Kelas $kelas, Request $request)
    {
        $request->validate([
            'nilai_absen' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
            'nilai_uts' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
        ],[
            'nilai_absen.required' => 'Kolom nilai absensi wajib diisi.',
            'nilai_absen.numeric' => 'Nilai harus berupa angka.',
            'nilai_tugas.required' => 'Kolom nilai tugas wajib diisi.',
            'nilai_tugas.numeric' => 'Nilai harus berupa angka.',
            'nilai_uts.required' => 'Kolom nilai uts wajib diisi.',
            'nilai_uts.numeric' => 'Nilai harus berupa angka.',
            'nilai_uas.required' => 'Kolom nilai uas wajib diisi.',
            'nilai_uas.numeric' => 'Nilai harus berupa angka.',
        ]);

        $total = $request->nilai_absen + $request->nilai_tugas + $request->nilai_uts + $request->nilai_uas;
        if ($total == 100) {
            $request->request->add(['kelas_id' => $kelas->id]);
            $item = FormatNilai::create($request->all());
            return redirect('/dosen/n/'.$kelas->id.'/nilai')->with('success','Persentase nilai telah dibuat.');        
        } else {
            return redirect('/dosen/n/'.$kelas->id.'/nilai/create')->with('error','Total persentase nilai harus = 100');
        }
    }
}
