<?php


namespace App\Repositories\E_learning;

use App\Models\Kelas;
use App\AppRoot\Repo\AppRepository;
use Illuminate\Http\Request;

class KelasRepository extends AppRepository
{
    protected $model;
    
    public function __construct(Kelas $model)
    {
        $this->model = $model;
    }
    
    /**
     * set payload data for posts table.
     * 
     * @param Request $request [description]
     * @return array of data for saving.
     */
    protected function setDataPayload(Request $request)
    {
        return [
            'matkul_id' => $request->input('matkul_id'),
            'dosen_id' => $request->input('dosen_id'),
            'hari' => $request->input('hari'),
            'waktu' => $request->input('waktu'),
            'thn_akademik' => $request->input('thn_akademik'),
        ];
    }
}