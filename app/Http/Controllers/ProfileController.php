<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return new UserResource(User::findOrFail($user->id));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $item = User::findOrFail($user->id);
        $item->fill([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        $item->save();
    }

}
