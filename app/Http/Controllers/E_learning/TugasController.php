<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use App\Models\Tugas;
use App\Models\Kelas;

class TugasController extends Controller
{
    public function index($id, Request $request)
    {
        $kelas = Kelas::find($id);
        $items = Tugas::all()->where('kelas_id', $id);
        return view('e_learning.dosen.tugas.index',compact('kelas','items'));
    }

    public function create($id)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.dosen.tugas.create',compact('kelas'));
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'file'  => 'required|mimes:pdf',
        ],[
            'judul.required' => 'Kolom judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari :max karakter.',
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
                $file->move('storage/tugas', $filenameSave);
            }
            $item = new Tugas;
            $item->judul = ucwords($request->input('judul'));
            $item->petunjuk = ucfirst($request->input('petunjuk'));
            $item->file = $filenameSave;
            $item->kelas_id = $id;
            $item->save();
            return redirect('/dosen/'.$id.'/tugas')->with('success','Tugas telah diposting.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function edit($id, $id2)
    {
        $kelas = Kelas::find($id);
        $item = Tugas::find($id2);
        return view('e_learning.dosen.tugas.edit',compact('kelas','item'));
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
            return redirect('/dosen/'.$id.'/tugas')->with('success','Tugas telah diupdate.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
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
