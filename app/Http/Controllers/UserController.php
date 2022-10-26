<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $offset = 0;
        $limit = 5;
        return ['users' => $this->user->with('posts')->limit($limit)->offset($offset)->get(), 'meta' => ['total' => $this->user->count(), 'page' => ceil(($offset + 1) / $limit)]];
    }

    public function store(UserStoreRequest $request)
    {
        $createdUser = User::create($request->validated());
        return response()->json($createdUser, 201);
    }

    public function show(Request $request)
    {
        return response()->json($this->user->with('posts')->where('id', $request->id)->get(), 200);
    }

    public function update(UserStoreRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json($user, 201);

    }

    public function destroy(UserDeleteRequest $request)
    {
        $user = User::where('id', $request->id)->delete();
        return response()->json(null, 204);
    }
}
