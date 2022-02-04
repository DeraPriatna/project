<?php


namespace App\Repositories;

use App\Models\User;
use App\AppRoot\Repo\AppRepository;
use Illuminate\Http\Request;

class UserRepository extends AppRepository
{
    protected $model;
    
    public function __construct(User $model)
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

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ];
    }
}