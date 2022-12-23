<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_learning\DosenRepository;
use Exception;
use Auth;
use Hash;
use App\Models\Dosen;
use App\Models\Kelas;

class DosenController extends Controller
{
    protected $repository;
  
    public function __construct(DosenRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = Dosen::select('*')->orderBy('nm_dsn')->get();
        return view('e_learning.admin.dosen.index',compact('items'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|numeric|unique:dosen,nidn',
            'nm_dsn' => 'required|max:50',
            'jk' => 'required',
            'email' => 'required|email|unique:dosen,email',
            'jab_fungs' => 'required|max:30',
            'pend' => 'required',
        ],[
            'nidn.required' => 'Kolom NIDN wajib diisi.',
            'nidn.numeric' => 'NIDN harus berupa angka.',
            'nidn.unique' => 'NIDN sudah digunakan.',
            'nm_dsn.required' => 'Kolom nama wajib diisi.',
            'nm_dsn.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'jk.required' => 'Kolom jenis kelamin wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan.',
            'jab_fungs.required' => 'Kolom jabatan fungsional wajib diisi.',
            'jab_fungs.max' => 'Jabatan fungsional tidak boleh lebih dari :max karakter.',
            'pend.required' => 'Kolom pendidikan wajib diisi.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin.dosen')->with('success','Data telah disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    
    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('e_learning.admin.dosen.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nidn' => 'required|numeric',
            'nm_dsn' => 'required|max:50',
            'email' => 'required|email',
            'jab_fungs' => 'required|max:30',
        ],[
            'nidn.required' => 'Kolom NIDN wajib diisi.',
            'nidn.numeric' => 'NIDN harus berupa angka.',
            'nm_dsn.required' => 'Kolom nama wajib diisi.',
            'nm_dsn.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
            'jab_fungs.required' => 'Kolom jabatan fungsional wajib diisi.',
            'jab_fungs.max' => 'Jabatan fungsional tidak boleh lebih dari :max karakter.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin.dosen')->with('success','Data telah diupdate.');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return redirect()->route('admin.dosen')->with('success','Data telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:dosen,email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'Silahkan masukan email.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.exists' => 'Email tidak terdaftar pada sistem.',
            'password.required' => 'Silahkan masukan password.',
            'password.min' => 'Masukan password minimal :min karakter.',
        ]);
        if(Auth::guard('dosen')->attempt($request->only('email','password'))){
            return redirect()->route('dosen.home');
        }else{
            return redirect()->route('dosen.login')->with('error','Login Gagal !');
        }
    }

    public function home()
    {
        $dsn_id = Auth::guard('dosen')->user()->id;
        $items = Kelas::all()->where('dosen_id', $dsn_id)->where('status',0);
        return view('e_learning.dosen.home',compact('items'));
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
        Auth::guard('dosen')->logout();
        return redirect('/');
    }
}
