<?php

namespace App\Repositories;

use App\Api\ApiMessages;
use App\Models\Participant;
use Laravel\Sanctum\PersonalAccessToken;

class ParticipantsRepository
{
    private $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    public function index()
    {
        $participants = $this->participant->all();

        return response()->json($participants, 200);
    }

    public function store($request)
    {
        $bearerToken = $request->bearerToken();
        $participant = $request->all();

        $token = PersonalAccessToken::findToken($bearerToken);
        $user = $token->tokenable;

        $participant['user_id'] = $user->id;
        $participant['subscription_date'] = date('Y-m-d');

        try {
            $this->participant->create($participant);

            return response()->json('new participant successfully registered', 201);

        } catch (\Throwable $th) {
            $message = new ApiMessages($th->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
