<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use App\Models\Materi;
use App\Models\Kelas;

class MateriController extends Controller
{
    public function index($route, $id, Request $request)
    {
        $kelas = Kelas::find($id);
        $items = Materi::select('*')->where('kelas_id', $id)->orderBy('created_at','desc')->get();
        return view('e_learning.dosen.materi.index',compact('route','kelas','items'));
    }

    public function index_mhs($route, $id)
    {
        $kelas = Kelas::find($id);
        $items = Materi::select('*')->where('kelas_id', $id)->orderBy('created_at','desc')->get();
        return view('e_learning.mahasiswa.materi.index',compact('route','kelas','items'));
    }

    public function create($route, $id)
    {
        $kelas = Kelas::find($id);
        return view('e_learning.dosen.materi.create',compact('route','kelas'));
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'file'  => 'required|mimes:pdf,mp4',
        ],[
            'judul.required' => 'Kolom judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari :max karakter.',
            'file.required' => 'Silahkan pilih file untuk diupload.',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf, mp4.',
            'file.uploaded' => 'File gagal diunggah.',
        ]);

        try {
            if($request->hasFile('file')){
                $file = $request->file;
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSave = str_replace(" ", "_", $filename).'_'.time().'.'.$extension;
                $file->move('storage/materi', $filenameSave);
            }
            $item = new Materi;
            $item->judul = ucwords($request->input('judul'));
            $item->deskripsi = ucfirst($request->input('deskripsi'));
            $item->file = $filenameSave;
            $item->kelas_id = $id;
            $item->save();
            return redirect('/dosen/m/'.$id.'/materi')->with('success','Materi telah diposting.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function edit($route, $id, $id2)
    {
        $kelas = Kelas::find($id);
        $item = Materi::find($id2);
        return view('e_learning.dosen.materi.edit',compact('route','kelas','item'));
    }

    public function update($id, $id2, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'file'  => 'mimes:pdf,mp4',
        ],[
            'judul.required' => 'Kolom judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari :max karakter.',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf, mp4.',
            'file.uploaded' => 'File gagal diunggah.',
        ]);

        try {           
            $item = Materi::find($id2);
            $item->judul = ucwords($request->judul);
            $item->deskripsi = ucfirst($request->deskripsi);
            if($request->hasFile('file')){
                $file = $request->file;
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSave = str_replace(" ", "_", $filename).'_'.time().'.'.$extension;
                $file->move('storage/materi', $filenameSave);
                
                File::delete('storage/materi/'.$item->file);
                $item->file = $filenameSave;
            }
            $item->save();
            return redirect('/dosen/m/'.$id.'/materi')->with('success','Materi telah diupdate.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function delete($id2)
    {
        try {
            $item = Materi::find($id2);
            File::delete('storage/materi/'.$item->file);
            $item->delete();
            return redirect()->back()->with('success','Materi telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
