<?php

namespace App\Http\Controllers;

use App\Http\Resources\BundleResource;
use App\Http\Resources\CreateBundleResource;
use App\Models\Bundle;
use App\Models\MetaBundle;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BundleResource::collection(Bundle::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return CreateBundleResource
     */
    public function create()
    {
        return new CreateBundleResource(MetaBundle::factory('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bundle::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return new BundleResource(Bundle::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = Bundle::findOrFail($request->id);
        $item->fill([
            'name' => $request->name,
        ]);
        $item->save();
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
