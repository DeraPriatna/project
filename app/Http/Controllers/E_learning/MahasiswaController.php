<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_learning\MahasiswaRepository;
use Exception;
use Auth;
use Hash;
use App\Models\Mahasiswa;
use App\Models\Anggota;

class MahasiswaController extends Controller
{
    protected $repository;
  
    public function __construct(MahasiswaRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = Mahasiswa::select('*')->orderBy('nim')->get();
        return view('e_learning.admin.mahasiswa.index',compact('items'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric|digits:9|unique:mahasiswa,nim',
            'nm_mhs' => 'required|max:50',
            'jk' => 'required',
            'email' => 'required|email|unique:mahasiswa,email',
        ],[
            'nim.required' => 'Kolom NIM wajib diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.digits' => 'NIM harus :digits digit.',
            'nim.unique' => 'NIM sudah digunakan.',
            'nm_mhs.required' => 'Kolom nama wajib diisi.',
            'nm_mhs.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin.mahasiswa')->with('success','Data telah disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    
    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('e_learning.admin.mahasiswa.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric|digits:9',
            'nm_mhs' => 'required|max:50',
            'email' => 'required|email',
        ],[
            'nim.required' => 'Kolom NIM wajib diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.digits' => 'NIM harus :digits digit.',
            'nm_mhs.required' => 'Kolom nama wajib diisi.',
            'nm_mhs.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin.mahasiswa')->with('success','Data telah diupdate.');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
  
    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return redirect()->route('admin.mahasiswa')->with('success','Data telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function alumni($id)
    {
        $status = Mahasiswa::find($id);
        $status->update(['status' => 'Alumni']);
        return redirect()->back();
    }

    public function nonaktif($id)
    {
        $status = Mahasiswa::find($id);
        $status->update(['status' => 'NonAktif']);
        return redirect()->back();
    }

    public function aktif($id)
    {
        $status = Mahasiswa::find($id);
        $status->update(['status' => 'Aktif']);
        return redirect()->back();
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:mahasiswa,email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'Silahkan masukan email.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.exists' => 'Email tidak terdaftar pada sistem.',
            'password.required' => 'Silahkan masukan password.',
            'password.min' => 'Masukan password minimal :min karakter.',
        ]);
        if(Auth::guard('mahasiswa')->attempt($request->only('email','password'))){
            return redirect()->route('mahasiswa.home');
        }else{
            return redirect()->route('mahasiswa.login')->with('error','Login Gagal !');
        }
    }

    public function home()
    {
        $mhs_id = Auth::guard('mahasiswa')->user()->id;
        $items = Anggota::all()->where('mahasiswa_id', $mhs_id);
        return view('e_learning.mahasiswa.home',compact('items'));
    }

    public function update_pass(Request $request)
    {
        $request->validate([
            'opassword' => 'required|min:6',
            'npassword' => 'required|min:6',
            'cpassword' => 'required|same:npassword',
        ],[
            'opassword.required' => 'Kolom password lama wajib diisi.',
            'opassword.min' => 'Password harus minimal :min karakter.',
            'npassword.required' => 'Kolom password baru wajib diisi.',
            'npassword.min' => 'Password harus minimal :min karakter.',
            'cpassword.required' => 'Kolom konfirmasi password wajib diisi.',
            'cpassword.same' => 'Konfirmasi password dan password baru harus sama.',
        ]);

        try {
            $current_user = auth()->user();
            if(Hash::check($request->opassword,$current_user->password)){
                $current_user->update([
                    'password' => bcrypt($request->npassword)
                ]);
                return redirect()->back()->with('success','Password berhasil diupdate.');
            }else{
                return redirect()->back()->with('error','Password lama tidak cocok.');
            }
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function logout()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect('/');
    }
}
