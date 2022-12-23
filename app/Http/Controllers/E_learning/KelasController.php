<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_learning\KelasRepository;
use Exception;
use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Anggota;
use App\Models\Kelas;
use App\Models\Absensi;

class KelasController extends Controller
{
    protected $repository;
  
    public function __construct(KelasRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        $absensi = Absensi::all();
        return view('e_learning.admin.kelas.index',compact('items','absensi'));
    }

    public function create()
    {
        $matkul = Matkul::all();
        $dosen = Dosen::all();
        return view('e_learning.admin.kelas.create',compact('matkul','dosen'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'matkul_id' => 'required',
            'dosen_id' => 'required',
            'hari' => 'required',
            'waktu' => 'required|min:11',
            'thn_akademik' => 'required|min:9',
        ],[
            'matkul_id.required' => 'Silahkan pilih mata kuliah.',
            'dosen_id.required' => 'Silahkan pilih dosen pengajar.',
            'hari.required' => 'Kolom hari wajib diisi.',
            'waktu.required' => 'Kolom waktu wajib diisi.',
            'waktu.min' => 'Waktu harus :min karakter.',
            'thn_akademik.required' => 'Kolom tahun akademik wajib diisi.',
            'thn_akademik.min' => 'Tahun akademik harus :min karakter.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin.kelas')->with('success','Kelas telah dibuat.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $item = $this->repository->show($id);
        $matkul = Matkul::all();
        $dosen = Dosen::all();
        return view('e_learning.admin.kelas.edit',compact('item','matkul','dosen'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'waktu' => 'required|min:11',
            'thn_akademik' => 'required|min:9',
        ],[
            'waktu.required' => 'Kolom waktu wajib diisi.',
            'waktu.min' => 'Waktu harus :min karakter.',
            'thn_akademik.required' => 'Kolom tahun akademik wajib diisi.',
            'thn_akademik.min' => 'Tahun akademik harus :min karakter.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin.kelas')->with('success','Kelas telah diupdate.');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return redirect()->route('admin.kelas')->with('success','Kelas telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function member($id)
    {
        $item = $this->repository->show($id);
        $mhs = Mahasiswa::select('*')->where('status','Aktif')->orderBy('nim')->get();
        $member = Anggota::all()->where('kelas_id', $id); 
        return view('e_learning.admin.kelas.member',compact('item','mhs','member'));
    }

    public function add(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
        ],[
            'mahasiswa_id.required' => 'Silahkan pilih mahasiswa.',
        ]);

        try {
            $request->request->add(['kelas_id' => $id]);
            Anggota::create($request->all());
            return redirect()->back()->with('success','Anggota telah ditambahkan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function remove($id)
    {
        $member = Anggota::find($id);
        $member->delete();
        return redirect()->back()->with('remove','Anggota telah dihapus.');
    }

    public function arsip($id)
    {
        $arsip = Kelas::find($id);
        $arsip->update(['status' => 1]);
        return redirect()->back()->with('success','Kelas telah diarsipkan.');
    }

    public function arsip_kelas()
    {
        $items = Kelas::all();
        $absensi = Absensi::all(); 
        return view('e_learning.admin.kelas.arsip',compact('items','absensi'));
    }

    public function cancel_arsip($id)
    {
        $arsip = Kelas::find($id);
        $arsip->update(['status' => 0]);
        return redirect()->back()->with('success','Arsip kelas telah dibatalkan.');
    }
}
