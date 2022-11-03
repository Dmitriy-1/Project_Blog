<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostDeleteRequest;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post;


    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = $request->limit ?? 5;
       return ['posts' => $this->post->with('user')->limit($limit)->offset($offset)->get(), 'meta' => ['total' => $this->post->count(), 'page' => ceil(($offset + 1) / $limit)]];
    }

    public function store(PostStoreRequest $request)
    {
        $createdPost = Post::create($request->validated());
        return response()->json($createdPost, 201);
    }

    public function show(Request $request)
    {
        return response()->json($this->post->with('user')->where('id', $request->id)->get(), 200);
    }

    public function update(PostStoreRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post, 201);
    }

    public function destroy(PostDeleteRequest $request)
    {
        $post = Post::where('id', $request->id)->delete();
        return response()->json(null, 204);
    }

}
