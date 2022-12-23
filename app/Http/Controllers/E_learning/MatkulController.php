<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_learning\MatkulRepository;
use Exception;
use App\Models\Matkul;

class MatkulController extends Controller
{
    protected $repository;
  
    public function __construct(MatkulRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = Matkul::select('*')->orderBy('kode')->get();
        return view('e_learning.admin.matkul.index',compact('items'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|min:7|max:7|unique:matkul,kode',
            'matkul' => 'required|max:50',
            'sks' => 'required',
            'semester' => 'required',
        ],[
            'kode.required' => 'Kolom kode wajib diisi.',
            'kode.min' => 'Kode harus :min karakter.',
            'kode.max' => 'Kode harus :max karakter.',
            'kode.unique' => 'Kode sudah digunakan.',
            'matkul.required' => 'Kolom mata kuliah wajib diisi.',
            'matkul.max' => 'Mata kuliah tidak boleh lebih dari :max karakter.',
            'sks.required' => 'Kolom SKS wajib diisi.',
            'semester.required' => 'Kolom semester wajib diisi.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin.matkul')->with('success','Data telah disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('e_learning.admin.matkul.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'kode' => 'required|min:7|max:7',
            'matkul' => 'required|max:50',
        ],[
            'kode.required' => 'Kolom kode wajib diisi.',
            'kode.min' => 'Kode harus :min karakter.',
            'kode.max' => 'Kode harus :max karakter.',
            'matkul.required' => 'Kolom mata kuliah wajib diisi.',
            'matkul.max' => 'Mata kuliah tidak boleh lebih dari :max karakter.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin.matkul')->with('success','Data telah diupdate.');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return redirect()->route('admin.matkul')->with('success','Data telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
