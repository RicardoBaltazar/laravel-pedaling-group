<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    public function createUser(Request $request)
    {
        $response = $this->authRepository->createUser($request);

        return $response;
    }

    public function loginUser(Request $request)
    {
        $response = $this->authRepository->loginUser($request);

        return $response;
    }
}
