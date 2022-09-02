<?php

namespace App\Repositories;

use App\Api\ApiMessages;
use App\Models\Ride;
use Laravel\Sanctum\PersonalAccessToken;

class RidesRepository
{
    private $ride;

    public function __construct(Ride $ride)
    {
        $this->ride = $ride;
    }

    public function index()
    {
        $rides = $this->ride->all();
        return response()->json($rides, 200);
    }

    public function store($request)
    {
        $bearerToken = $request->bearerToken();
        $newRide = $request->all();

        if (!$bearerToken) {
            return "Error: Token not found";
        }

        $token = PersonalAccessToken::findToken($bearerToken);
        $user = $token->tokenable;

        $newRide['user_id'] = $user->id;

        try {
            // $this->ride->create($newRide);

            return response()->json('new ride created successfully', 201);

        } catch (\Throwable $th) {
            $message = new ApiMessages($th->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function update($request, $id)
    {
        $newata = $request->all();
        $ride = $this->ride->findOrFail($id);

        try {
            $ride->update($newata);

            return response()->json([
                'message' => 'ride successfully updated',
                'newRide' => $ride
            ], 201);

        } catch (\Throwable $th) {
            $message = new ApiMessages($th->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function destroy($id)
    {
        $ride = $this->ride->findOrFail($id);

        try {
            $ride->delete();

            return response()->json([
                'message' => 'ride removed successfully',
            ], 201);

        } catch (\Throwable $th) {
            $message = new ApiMessages($th->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
