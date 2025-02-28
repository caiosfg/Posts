<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOpnionRequest;
use App\Http\Requests\UpdateOpnionRequest;
use App\Models\Opnion;
use App\Http\Resources\OpnionResource;
use Illuminate\Support\Facades\Gate;

class OpnionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Opnion::class);

        return OpnionResource::collection(auth()->user()->opnions()->get());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOpnionRequest $request)
    {
        if (request()->user()->cannot('create',Opnion::class )) {
            abort(403, 'Unauthorized');
        }

        $opnion = $request->user()->opnions()->create($request->validated());
        // $opnion = Opnion::create($request->validated());

        return OpnionResource::make($opnion);
    }

    /**
     * Display the specified resource.
     */
    public function show(Opnion $opnion)
    {
        Gate::authorize('view',$opnion);

        return OpnionResource::make($opnion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOpnionRequest $request, Opnion $opnion)
    {
        if ($request->user()->cannot('update',$opnion )) {
            abort(403, 'Unauthorized');
        }

        $opnion->update($request->validated());

        return OpnionResource::make($opnion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opnion $opnion)
    {
        if (request()->user()->cannot('delete',$opnion )) {
            abort(403, 'Unauthorized');
        }

        $opnion->delete();

        return response()->noContent();
    }
}
