<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDevRequest;
use App\Http\Requests\UpdateDevRequest;
use App\Http\Resources\Dev\DevManyResource;
use App\Http\Resources\Dev\DevOneResource;
use App\Models\Dev;
use App\Models\StoreState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DevController extends Controller
{
    public function index()
    {
        return DevManyResource::collection(Dev::all());
    }

    public function store(StoreDevRequest $request)
    {
        $new = Dev::create([
            'n' => $request->input('n'),
            'date' => $request->input('date'),
            'troubles' => $request->input('troubles_text'),
            'customer_id' => $request->input('customer_id'),
            'type_id' => $request->input('type_id'),
            'vendor_id' => $request->input('vendor_id'),
            'sn' => $request->input('sn'),
        ]);

        $arr = $request->input('bundles.*');
        $newArr = [];

        foreach ($arr as $item){
            $newArr[] = [
                'bundle_id' => $item['id'],
                'dev_id' => $new->id
            ];
        }

        DB::table('store_bundles')->insert($newArr);
        StoreState::create(['user_id' => $this->user->id, 'dev_id' => $new->id, 'state_id' => 1]);
    }

    public function show($id)
    {
        return new DevOneResource(Dev::findOrFail($id));
    }

    public function update(UpdateDevRequest $request, $id)
    {
        $user = Auth::user();
        $dev = Dev::findOrFail($id);
        $dev->fill([
            'n' => $request->input('n'),
            'customer_id' => $request->input('customer.id'),
            'vendor_id' => $request->input('vendor.id'),
            'type_id' => $request->input('type.id'),
            'sn' => $request->input('sn'),
            'final' => $request->input('final'),
            'date' => $request->input('date'),
            'troubles' => $request->input('troubles_text'),
            'notification' => $request->input('notification'),
            'user_id' => $user->id,
        ]);
        $dev->save();

        $arr = $request->input('bundles');
        $newArr = [];
        foreach ($arr as $item){
            if(isset($item['checked'])){
                $newArr[] = [
                    'bundle_id' => $item['id'],
                    'dev_id' => $dev->id,
                ];
            }
        }

        DB::table('store_bundles')->where('dev_id', '=', $dev->id)->delete();
        DB::table('store_bundles')->insert($newArr);
        return $newArr;
    }

    public function destroy($id)
    {
        Dev::destroy($id);
    }
}
