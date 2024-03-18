<?php

namespace App\Http\Repositories\User;

use App\Http\HttpClients\ContactClient;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Traits\HttpResponse;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    use HttpResponse;
    public $contactClient;

    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->contactClient = new ContactClient();

    }

    public function login($request)
    {
        $token=Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
        if(!$token) {
            return  $this->errorResponse('Unauthorized', 401);
        }
        $user = Auth::user();
        return $this->successResponse(["user"=>$user,'token'=>$token]);

    }
     public function contactClient($request)
     {
         $data=$this->contactClient->sendRequest('POST','client_info_url', [] ,$request['client_id']);
         return $this->successResponse($data);

     }
}