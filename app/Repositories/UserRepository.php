<?php


namespace App\Repositories;

use App\Models\User;
use App\AppRoot\Repo\AppRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'hak_akses' => 'Admin',
            'kd_login' => '1',
            'remember_token' => Str::random(60),
        ];
    }
}