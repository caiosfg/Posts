<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOpnionRequest;
use App\Http\Requests\UpdateOpnionRequest;
use App\Models\Opnion;
use App\Http\Resources\OpnionResource;

class OpnionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OpnionResource::collection(Opnion::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOpnionRequest $request)
    {
        $opnion = Opnion::create($request->validated());

        return OpnionResource::make($opnion);
    }

    /**
     * Display the specified resource.
     */
    public function show(Opnion $opnion)
    {
        return OpnionResource::make($opnion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOpnionRequest $request, Opnion $opnion)
    {
        $opnion->update($request->validated());

        return OpnionResource::make($opnion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opnion $opnion)
    {
        $opnion->delete();

        return response()->noContent();
    }
}
