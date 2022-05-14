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
        return StoreState::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'state_id' => $request->state_id,
            'dev_id' => $request->dev_id,
        ]);
    }
}
