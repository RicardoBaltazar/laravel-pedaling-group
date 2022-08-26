<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RidesRequest;
use App\Repositories\RidesRepository;
use Illuminate\Http\Request;

class RidesController extends Controller
{
    private $ridesRepository;

    public function __construct(RidesRepository $RidesRepository)
    {
        $this->ridesRepository = $RidesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->ridesRepository->index();
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RidesRequest $request)
    {
        $response = $this->ridesRepository->store($request);
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json('show' . $id, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RidesRequest $request, $id)
    {
        $response = $this->ridesRepository->update($request, $id);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->ridesRepository->destroy($id);
        return $response;
    }
}
