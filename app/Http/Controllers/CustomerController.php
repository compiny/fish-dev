<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {

        $items = Customer::all();

        return CustomerResource::collection($items);
    }


    public function store(StoreCustomerRequest $request)
    {

        $user = Auth::user();
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'adr' => $request->adr,
            'phone' => $request->phone,
            'description' => $request->description,
            'user_id' => $user->id,
        ]);
        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CustomerResource( Customer::findOrFail($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return new CustomerResource( Customer::findOrFail($id) );
    }

    public function update( UpdateCustomerRequest $request )
    {

        $user = Auth::user();
        $customer = Customer::findOrFail($request->id);
        $customer->fill([
            'name' => $request->name,
            'email' => $request->email,
            'adr' => $request->adr,
            'phone' => $request->phone,
            'description' => $request->description,
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
