<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Post::class);

        return PostResource::collection(auth()->user()->posts()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if (request()->user()->cannot('create', Post::class )) {
            abort(403, 'Unauthorized');
        }

        $post = $request->user()->posts()->create($request->validated());
        // $post = Post::create($request->validated());

        return PostResource::make($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('view',$post);

        return PostResource::make($post);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->user()->cannot('update',$post )) {
            abort(403, 'Unauthorized');
        }

        $post->update($request->validated());

        return PostResource::make($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (request()->user()->cannot('delete',$post )) {
            abort(403, 'Unauthorized');
        }

        $post->delete();

        return response()->noContent();
    }
}
