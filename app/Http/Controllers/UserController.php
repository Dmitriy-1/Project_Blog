<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user=$user;
    }

    public function index()
    {

        return $this->user->with('posts')->simplePaginate(5);
    }

    public function store(UserStoreRequest $request){
        $createdUser = User::create($request->validated());
        return response()->json($createdUser, 201);
    }

    public function show(Request $request){
        return response()->json($this->user->with('posts')->where('id', $request->id)->get(), 200);
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
