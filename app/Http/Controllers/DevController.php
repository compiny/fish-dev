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
use Illuminate\Http\Request;
use App\Http\Resources\CreateDevResource;
use Illuminate\Support\Facades\DB;

class DevController extends Controller
{
    public function index()
    {
        $items = DB::table('devs')
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
            'customer_id' => 1,
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

        return DB::table('store_bundles')->insert($newArr);
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

    public function edit($id): DevResource
    {
        return new DevResource(Dev::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevRequest $request, $id)
    {
        $user = Auth::user();
        $customer = Customer::findOrFail($request->id);
        $customer->fill([
            'n' => $request->n,
            'customer_id' => $request->customer_id,
            'vendor_id' => $request->vendor_id,
            'type_id' => $request->type_id,
            'sn' => $request->sn,
            'final' => $request->final,
            'date' => $request->date,
            'troubles' => $request->troubles,
            'notification' => $request->notification,
            'user_id' => $user->id,
        ]);
        $customer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
