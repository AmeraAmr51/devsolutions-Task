<?php

namespace App\Http\Controllers;

use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\Http\Traits\HttpResponse;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    use HttpResponse;
    //
    /**
     *
     * @var UserRepositoryInterface
     */

    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;

    }


    public function login(UserRequest $request)
    {
        try {
            //code...
            return $this->repository->login($request->validated());
        } catch (\Throwable $th) {
            //throw $th;
            return $this->errorResponse($th->getMessage());

        }

    }

    public function index()
    {
        try {
            //code...
            $users = $this->repository->all();
            return $this->successResponse($users);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->errorResponse($th->getMessage());
        }
    }
    public function create(UserRequest $request)
    {
        DB::beginTransaction();
        try {

            $user = $this->repository->create($request->validated());
            DB::commit();
            return $this->successResponse($user, "User Created Success", 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }
    public function update(UserRequest $request, $id)
    {
        try {

            $this->repository->update($request->validated(), $id);
            return $this->successResponse(null, "User Updated Success", 201);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->errorResponse($th->getMessage());
        }
    }
    public function show($id)
    {
        try {

            $user = $this->repository->show($id);
            return $this->successResponse($user);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->errorResponse($th->getMessage());
        }
    }
    public function delete($id)
    {
        try {

            $this->repository->delete($id);
            return $this->successResponse(null, "User Deleted Success", 204);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->errorResponse($th->getMessage());
        }
    }

    public function clientInfo(UserRequest $request)
    {
        try {
            $data = $this->repository->contactClient($request->validated());
            return $this->successResponse($data);

        } catch (\Throwable $th) {
            //throw $th;
            return $this->errorResponse($th->getMessage());
        }

    }


}