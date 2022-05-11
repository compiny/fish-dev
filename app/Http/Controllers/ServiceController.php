<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceResource::collection(Service::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        Service::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
    }

    public function show($id)
    {
        return new ServiceResource(Service::findOrFail($id));
    }

    public function edit($id)
    {
        return new ServiceResource(Service::findOrFail($id));
    }

    public function update(UpdateServiceRequest $request)
    {
        $item = Service::findOrFail($request->id);
        $item->fill([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        $item->save();
    }

    public function destroy($id)
    {
        //
    }
}
