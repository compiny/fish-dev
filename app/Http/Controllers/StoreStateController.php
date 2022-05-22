<?php

namespace App\Http\Controllers;

use App\Models\StoreState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreStateController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $response = StoreState::create([
            'user_id' => $user->id,
            'state_id' => $request->state_id,
            'dev_id' => $request->dev_id,
        ]);

        return [
            'dev_id' => $response->dev_id,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'state_id' => $response->state_id,
        ];
    }
}
