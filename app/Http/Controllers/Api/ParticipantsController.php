<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ParticipantsRepository;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    private $participantsRepository;

    public function __construct(ParticipantsRepository $participantsRepository)
    {
        $this->participantsRepository = $participantsRepository;
    }

    public function index()
    {
        $response = $this->participantsRepository->index();
        return $response;
    }

    public function store(Request $request)
    {
        $response = $this->participantsRepository->store($request);
        return $response;
    }
}
