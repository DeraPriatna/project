<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Auth;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\DetailAbsensi;
use App\Models\Anggota;

class AbsensiController extends Controller
{
    public function index($route, $id)
    {
        $kelas = Kelas::find($id);
        $absensi = Absensi::all()->where('kelas_id', $id);
        $d_absensi = DetailAbsensi::all();
        $anggota = Anggota::all()->where('kelas_id', $id); 
        return view('e_learning.dosen.absensi.index',compact('route','kelas','absensi','d_absensi','anggota'));
    }

    public function index_mhs($route, $id)
    {
        $kelas = Kelas::find($id);
        $mhs_id = Auth::guard('mahasiswa')->user()->id;
        $absensi = Absensi::all()->where('kelas_id', $id)->where('status', '0');
        $d_absensi = DetailAbsensi::all()->where('kelas_id', $id)->where('mahasiswa_id', $mhs_id);
        return view('e_learning.mahasiswa.absensi.index',compact('route','kelas','absensi','d_absensi'));
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'pertemuan' => 'required',
        ],[
            'pertemuan.required' => 'Silahkan pilih pertemuan.',
        ]);

        try {
            $request->request->add(['kelas_id' => $id]);
            $request->request->add(['status' => '0']);
            $pertemuan = $request->pertemuan;
            Absensi::create($request->all());

            $absensi = Absensi::all()->where('pertemuan', $pertemuan);
            $anggota = Anggota::all()->where('kelas_id', $id);            
            foreach ($absensi as $abs) {
                foreach($anggota as $agt){
                    DetailAbsensi::create(['absensi_id' => $abs->id, 'kelas_id' => $id, 'mahasiswa_id' => $agt->mahasiswa_id, 'ket' => 'x']);                    
                }
            }    
            return redirect()->back();
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function store_mhs($id, $id2, Request $request)
    {
        try {
            $mhs_id = Auth::guard('mahasiswa')->user()->id;
            $d_absensi = DetailAbsensi::all()->where('absensi_id', $id2)->where('kelas_id', $id)->where('mahasiswa_id', $mhs_id);
            foreach ($d_absensi as $d_abs) {
                $d_abs->update(['ket' => $request->ket]);
            }
            return redirect()->back()->with('success','Absensi telah terkirim.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $item = Absensi::find($id);
            $item->update($request->all());
            return redirect()->back();
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
