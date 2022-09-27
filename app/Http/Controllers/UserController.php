<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    public function store(UserStoreRequest $request){
        $createdUser = User::create($request->validated());
        return response()->json($createdUser, 201);
    }

    public function show(User $user){
        return response()->json($user, 200);
    }

    public function update(UserStoreRequest $request, User $user){
        $user->update($request->validated());
        return response()->json($user, 201);

    }

    public function destroy (User $user){
        $user->delete();
        return response()->json(null,204);
    }
}
