<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post=$post;
    }
    public function index()
    {
        return $this->post->with('user')->simplePaginate(5);
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

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }

}
