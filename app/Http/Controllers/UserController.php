<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return UserResource::collection(User::paginate());
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);
    }

    public function edit($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail($request->id);
        $user->fill([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        $user->save();
    }

    public function destroy($id)
    {
        //
    }
}
