<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\KangarooRequest;
use App\Http\Resources\KangarooResource;
use App\Models\Kangaroo;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class KangarooController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): ResourceCollection
    {
        return KangarooResource::collection(Kangaroo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  KangarooRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KangarooRequest $request): JsonResponse
    {
        try {
            $data = Kangaroo::create($request->all());

            return response()->json([
                'status'  => 'success',
                'message' => 'Data inserted and saved successfully',
                'data'    => $data
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'An error occurred while storing the data'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Kangaroo $kangaroo
     * @return KangarooResource
     */
    public function show(Kangaroo $kangaroo): KangarooResource
    {
        return KangarooResource::make($kangaroo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  KangarooRequest  $request
     * @param  Kangaroo  $kangaroo
     * @return JsonResponse
     */
    public function update(KangarooRequest $request, Kangaroo $kangaroo): JsonResponse
    {
        try {
            $kangaroo->update($request->all());

            return response()->json([
                'status'  => 'success',
                'message' => 'Data updated successfully'
            ], 200);
        } catch (\Exception $e) {
            // Handle the error and return an appropriate JSON response
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to update kangaroo'
            ], 500);
        }
    }
}
