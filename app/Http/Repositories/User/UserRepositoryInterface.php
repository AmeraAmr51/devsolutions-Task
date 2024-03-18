<?php

namespace App\Http\Repositories\User;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function login($request);
    public function contactClient($request);

}