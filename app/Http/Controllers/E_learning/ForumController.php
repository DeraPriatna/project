<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Kelas;
use App\Models\Forum;
use App\Models\Komentar;

class ForumController extends Controller
{
    public function index($route, $id)
    {
        $kelas = Kelas::find($id);
        $items = Forum::select('*')->orderBy('created_at','desc')->where('kelas_id', $id)->get();
        return view('e_learning.dosen.forum.index',compact('route','kelas','items'));
    }

    public function index_mhs($route, $id)
    {
        $kelas = Kelas::find($id);
        $items = Forum::select('*')->orderBy('created_at','desc')->where('kelas_id', $id)->get();
        return view('e_learning.mahasiswa.forum.index',compact('route','kelas','items'));
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'konten' => 'required',
        ],[
            'judul.required' => 'Kolom judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari :max karakter.',
            'konten.required' => 'Kolom konten wajib diisi.',
        ]);

        $dsn_id = Auth::guard('dosen')->user()->id;
        $request->request->add(['dosen_id' => $dsn_id]);
        $request->request->add(['kelas_id' => $id]);
        $item = Forum::create($request->all());
        return redirect()->back()->with('success','Forum telah dibuat.');        
    }

    public function store_mhs($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'konten' => 'required',
        ],[
            'judul.required' => 'Kolom judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari :max karakter.',
            'konten.required' => 'Kolom konten wajib diisi.',
        ]);

        $mhs_id = Auth::guard('mahasiswa')->user()->id;
        $request->request->add(['mahasiswa_id' => $mhs_id]);
        $request->request->add(['kelas_id' => $id]);
        $item = Forum::create($request->all());
        return redirect()->back()->with('success','Forum telah dibuat.');        
    }

    public function view($route, $id, Forum $forum)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.dosen.forum.view',compact('route','kelas','forum'));
    }

    public function view_mhs($route, $id, Forum $forum)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.mahasiswa.forum.view',compact('route','kelas','forum'));
    }

    public function komentar($id, Request $request)
    {
        $request->validate([
            'konten' => 'required',
        ],[
            'konten.required' => 'Silahkan ketikan komentar...',
        ]);

        $dsn_id = Auth::guard('dosen')->user()->id;
        $request->request->add(['dosen_id' => $dsn_id]);
        $item = Komentar::create($request->all());
        return redirect()->back();
    }

    public function komentar_mhs($id, Request $request)
    {
        $request->validate([
            'konten' => 'required',
        ],[
            'konten.required' => 'Silahkan ketikan komentar...',
        ]);

        $mhs_id = Auth::guard('mahasiswa')->user()->id;
        $request->request->add(['mahasiswa_id' => $mhs_id]);
        $item = Komentar::create($request->all());
        return redirect()->back();
    }
}
