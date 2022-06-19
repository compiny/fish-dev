<?php

namespace App\Http\Controllers;

use App\Helpers\CPaginator;
use App\Http\Requests\StoreDevRequest;
use App\Http\Requests\UpdateDevRequest;
use App\Http\Resources\DevCollection;
use App\Http\Resources\DevResource;
use App\Models\Bundle;
use App\Models\Customer;
use App\Models\MetaDev;
use App\Models\Dev;
use App\Models\StoreBundle;
use App\Models\StoreState;
use Illuminate\Http\Request;
use App\Http\Resources\CreateDevResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DevController extends Controller
{
    public function index()
    {

        $items = DB::table('devs')
            ->select([
                'devs.id',
                'devs.n',
                'devs.date',
                'customers.name',
                'devs.sn',
                //DB::raw('count(*) as state_name')
            ])
            ->leftJoin('customers', 'devs.customer_id', '=', 'customers.id')
            ->get();
        return Dev::getJsonData($items);
    }

    public function create()
    {
        return new CreateDevResource(MetaDev::factory());
    }

    public function store(StoreDevRequest $request)
    {
        $new = Dev::create([
            'n' => $request->input('dev.n'),
            'date' => $request->input('dev.date'),
            'troubles' => $request->input('dev.troubles_text'),
            'customer_id' => $request->input('dev.customer_id'),
            'type_id' => $request->input('dev.type_id'),
            'vendor_id' => $request->input('dev.vendor_id'),
            'sn' => $request->input('dev.sn'),
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

        $user = Auth::user();
        StoreState::create(['user_id' => $user->id, 'dev_id' => $new->id, 'state_id' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return new DevResource(Dev::findOrFail($id));
    }

    public function update(UpdateDevRequest $request)
    {

        $user = Auth::user();
        $dev = Dev::findOrFail($request->input('dev.id'));

        $dev->fill([
            'n' => $request->input('dev.n'),
            'customer_id' => $request->input('dev.customer_id'),
            'vendor_id' => $request->input('dev.vendor_id'),
            'type_id' => $request->input('dev.type_id'),
            'sn' => $request->input('dev.sn'),
            'final' => $request->input('dev.final'),
            'date' => $request->input('dev.date'),
            'troubles' => $request->input('dev.troubles_text'),
            'notification' => $request->input('dev.notification'),
            'user_id' => $user->id,
        ]);
        $dev->save();

        $arr = $request->input('bundles.*');
        $newArr = [];
        foreach ($arr as $item){
            $newArr[] = [
                'bundle_id' => $item['id'],
                'dev_id' => $dev->id
            ];
        }

        DB::table('store_bundles')->where('dev_id', '=', $dev->id)->delete();
        DB::table('store_bundles')->insert($newArr);
        //return $newArr;

    }

    public function destroy($id)
    {
        //
    }
}
