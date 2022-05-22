<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        return SettingResource::collection(Setting::all());
    }

    public function update(Request $request)
    {
        $item = Setting::findOrFail($request->id);
        $item->fill([
            'value' => $request->value,
        ]);
        $item->save();
    }

}
