<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        //return $post;
        return response()->json($post, 200);

    }

    public function store(PostStoreRequest $request){
        $createdPost = Post::create($request->validated());
        return response()->json($createdPost, 201);

    }

    public function show(Post $post){
        return response()->json($post, 200);
    }

    public function update(PostStoreRequest $request, Post $post){
        $post->update($request->validated());
        return response()->json($post, 202);

    }

    public function destroy (Post $post){
        $post->delete();
        return response()->json(null,200);///???????
    }

}
