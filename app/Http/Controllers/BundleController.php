<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBundleRequest;
use App\Http\Requests\UpdateBundleRequest;
use App\Http\Resources\BundleResource;
use App\Http\Resources\CreateBundleResource;
use App\Http\Resources\DevBundleResource;
use App\Models\Bundle;
use App\Models\MetaBundle;
use App\Models\StoreBundle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param = $request->input();
        if($param){
            $data = DB::table('bundles')
                ->where('type_id', '=', $param['type_id'])
                ->get();
            return new DevBundleResource($data);
        }else{
            $data = Bundle::all();
            return BundleResource::collection($data);
        }

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
    public function store(StoreBundleRequest $request)
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
    public function show($id)
    {
        return new BundleResource(Bundle::findOrFail($id));
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
    public function update(UpdateBundleRequest $request)
    {
        $item = Bundle::findOrFail($request->id);
        $item->fill([
            'name' => $request->name,
            'type_id' => $request->type_id,
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
