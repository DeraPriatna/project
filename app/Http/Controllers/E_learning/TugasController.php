<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use Auth;
use App\Models\Tugas;
use App\Models\Kelas;
use App\Models\DetailTugas;

class TugasController extends Controller
{
    public function index($route, $id)
    {
        $kelas = Kelas::find($id);
        $items = Tugas::select('*')->where('kelas_id', $id)->orderBy('created_at','desc')->get();
        return view('e_learning.dosen.tugas.index',compact('route','kelas','items'));
    }

    public function index_mhs($route, $id)
    {
        $kelas = Kelas::find($id);
        $items = Tugas::select('*')->where('kelas_id', $id)->orderBy('created_at','desc')->get();
        return view('e_learning.mahasiswa.tugas.index',compact('route','kelas','items'));
    }

    public function create($route, $id)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.dosen.tugas.create',compact('route','kelas'));
    }

    public function view($route, $id, Tugas $tugas)
    {
        $kelas = Kelas::find($id);
        $d_tugas = DetailTugas::all()->where('tugas_id', $tugas->id);
        return view('e_learning.dosen.tugas.view',compact('route','kelas','tugas','d_tugas'));
    }

    public function view_tugas($route, $id, Tugas $tugas, DetailTugas $d_tugas)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.dosen.tugas.view_tugas',compact('route','kelas','tugas','d_tugas'));
    }

    public function edit_nilai($route, $id, Tugas $tugas, DetailTugas $d_tugas)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.dosen.tugas.edit_nilai',compact('route','kelas','tugas','d_tugas'));
    }

    public function view_mhs($route, $id, Tugas $tugas)
    {
        $kelas = Kelas::find($id);
        $d_tugas = DetailTugas::all()->where('tugas_id', $tugas->id)->where('mahasiswa_id', Auth::guard('mahasiswa')->user()->id);
        return view('e_learning.mahasiswa.tugas.view',compact('route','kelas','tugas','d_tugas'));
    }

    public function create_uts($route, $id)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.dosen.tugas.create_uts',compact('route','kelas'));
    }

    public function create_uas($route, $id)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.dosen.tugas.create_uas',compact('route','kelas'));
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'file'  => 'required|mimes:pdf',
            'tenggat'  => 'required',
        ],[
            'judul.required' => 'Kolom judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari :max karakter.',
            'file.required' => 'Silahkan pilih file untuk diupload.',
            'file.mimes' => 'File harus berupa file dengan tipe pdf.',
            'tenggat.required' => 'Kolom tenggat wajib diisi.',
            'file.uploaded' => 'File gagal diunggah.',
        ]);

        try {
            if($request->hasFile('file')){
                $file = $request->file;
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSave = str_replace(" ", "_", $filename).'_'.time().'.'.$extension;
                $file->move('storage/tugas', $filenameSave);
            }
            $item = new Tugas;
            $item->judul = ucwords($request->input('judul'));
            $item->petunjuk = ucfirst($request->input('petunjuk'));
            $item->file = $filenameSave;
            $item->tenggat = $request->tenggat;
            $item->kelas_id = $id;
            $item->save();
            return redirect('/dosen/t/'.$id.'/tugas')->with('success','Tugas telah diposting.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function store_uts($id, Request $request)
    {
        $request->validate([
            'file'  => 'required|mimes:pdf',
            'tenggat'  => 'required',
        ],[
            'file.required' => 'Silahkan pilih file untuk diupload.',
            'file.mimes' => 'File harus berupa file dengan tipe pdf.',
            'tenggat.required' => 'Kolom tenggat wajib diisi.',
            'file.uploaded' => 'File gagal diunggah.',
        ]);

        try {
            if($request->hasFile('file')){
                $file = $request->file;
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSave = str_replace(" ", "_", $filename).'_'.time().'.'.$extension;
                $file->move('storage/tugas', $filenameSave);
            }
            $item = new Tugas;
            $item->judul = $request->input('judul');
            $item->petunjuk = ucfirst($request->input('petunjuk'));
            $item->file = $filenameSave;
            $item->tenggat = $request->tenggat;
            $item->kelas_id = $id;
            $item->status = 1;
            $item->save();
            return redirect('/dosen/t/'.$id.'/tugas')->with('success','Ujian Tengah Semester (UTS) telah diposting.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function store_uas($id, Request $request)
    {
        $request->validate([
            'file'  => 'required|mimes:pdf',
            'tenggat'  => 'required',
        ],[
            'file.required' => 'Silahkan pilih file untuk diupload.',
            'file.mimes' => 'File harus berupa file dengan tipe pdf.',
            'tenggat.required' => 'Kolom tenggat wajib diisi.',
            'file.uploaded' => 'File gagal diunggah.',
        ]);

        try {
            if($request->hasFile('file')){
                $file = $request->file;
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSave = str_replace(" ", "_", $filename).'_'.time().'.'.$extension;
                $file->move('storage/tugas', $filenameSave);
            }
            $item = new Tugas;
            $item->judul = $request->input('judul');
            $item->petunjuk = ucfirst($request->input('petunjuk'));
            $item->file = $filenameSave;
            $item->tenggat = $request->tenggat;
            $item->kelas_id = $id;
            $item->status = 2;
            $item->save();
            return redirect('/dosen/t/'.$id.'/tugas')->with('success','Ujian Akhir Semester (UAS) telah diposting.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function store_mhs($id, Tugas $tugas, Request $request)
    {
        $request->validate([
            'file'  => 'required|mimes:pdf',
        ],[
            'file.required' => 'Silahkan pilih file untuk diupload.',
            'file.mimes' => 'File harus berupa file dengan tipe pdf.',
            'file.uploaded' => 'File gagal diunggah.',
        ]);

        try {
            if($request->hasFile('file')){
                $file = $request->file;
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSave = str_replace(" ", "_", $filename).'_'.time().'.'.$extension;
                $file->move('storage/detail_tugas', $filenameSave);
            }
            $item = new DetailTugas;
            $item->tugas_id = $tugas->id;
            $item->mahasiswa_id = Auth::guard('mahasiswa')->user()->id;
            $item->file = $filenameSave;
            $item->save();
            return redirect('/mahasiswa/t/'.$id.'/tugas/'.$tugas->id.'/view')->with('success','Tugas diserahkan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function edit($route, $id, $id2)
    {
        $kelas = Kelas::find($id);
        $item = Tugas::find($id2);
        return view('e_learning.dosen.tugas.edit',compact('route','kelas','item'));
    }

    public function update($id, $id2, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'file' => 'mimes:pdf',
        ],[
            'judul.required' => 'Kolom judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari :max karakter.',
            'file.mimes' => 'File harus berupa file dengan tipe pdf.',
            'file.uploaded' => 'File gagal diunggah.',
        ]);

        try {           
            $item = Tugas::find($id2);
            $item->judul = ucwords($request->judul);
            $item->petunjuk = ucfirst($request->petunjuk);
            $item->tenggat = $request->tenggat;
            if($request->hasFile('file')){
                $file = $request->file;
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSave = str_replace(" ", "_", $filename).'_'.time().'.'.$extension;
                $file->move('storage/tugas', $filenameSave);
                
                File::delete('storage/tugas/'.$item->file);
                $item->file = $filenameSave;
            }
            $item->save();
            return redirect('/dosen/t/'.$id.'/tugas')->with('success','Tugas telah diupdate.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function nilai($id, Tugas $tugas, DetailTugas $d_tugas, Request $request)
    {
        $request->validate([
            'nilai' => 'required|numeric|max:100|min:0',
        ],[
            'nilai.required' => 'Kolom nilai wajib diisi.',
            'nilai.numeric' => 'Nilai harus berupa angka.',
            'nilai.max' => 'Nilai tidak boleh lebih besar dari 100.',
            'nilai.min' => 'Nilai tidak boleh lebih kecil dari 0.',
        ]);

        try {
            $d_tugas->update($request->all());
            return redirect('/dosen/t/'.$id.'/tugas/'.$tugas->id.'/view')->with('success','Tugas telah dinilai.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function delete($id2)
    {
        try {
            $item = Tugas::find($id2);
            File::delete('storage/tugas/'.$item->file);
            $item->delete();
            return redirect()->back()->with('success','Tugas telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
