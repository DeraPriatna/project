<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_learning\UserRepository;
use Exception;
use Auth;
use Hash;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kelas;

class UserController extends Controller
{
    protected $repository;
  
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        return view('e_learning.admin.users.index',compact('items'));
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:15',
            'cpassword' => 'required|same:password',
        ],[
            'name.required' => 'Kolom nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Kolom password wajib diisi.',
            'password.min' => 'Password harus minimal :min karakter.',
            'password.max' => 'Password tidak boleh lebih dari :max karakter.',
            'cpassword.required' => 'Kolom konfirmasi password wajib diisi.',
            'cpassword.same' => 'Konfirmasi password dan password harus sama.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin.user')->with('success','Data telah disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('e_learning.admin.users.edit',compact('item'));
    }
  
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
        ],[
            'name.required' => 'Kolom nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin.user')->with('success','Data telah diupdate.');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
  
    public function show($id)
    {
        try {
            $item = $this->repository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return redirect()->route('admin.user')->with('success','Data telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'Silahkan masukan email.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.exists' => 'Email tidak terdaftar pada sistem.',
            'password.required' => 'Silahkan masukan password.',
            'password.min' => 'Masukan password minimal :min karakter.',
        ]);
        if(Auth::guard('web')->attempt($request->only('email','password'))){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('error','Login Gagal !');
        }
    }

    public function home()
    {
        $mhs = Mahasiswa::all();
        $dsn = Dosen::all();
        $kls = Kelas::all()->where('status',0);
        $arsip = Kelas::all()->where('status',1);
        return view('e_learning.admin.home',compact('mhs','dsn','kls','arsip'));
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
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
