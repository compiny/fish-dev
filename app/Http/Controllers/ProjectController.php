<?php

namespace App\Http\Controllers;


use App\Http\Resources\User;
use App\Models\MetaDev;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\CreateProjectResource;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $user = Auth::user();

        $data = DB::table('store_projects')
            ->join('projects', 'projects.id', '=', 'store_projects.project_id')
            ->leftJoin('users', 'users.id', '=', 'store_projects.user_id')
            ->leftJoin('customers', 'customers.id', '=', 'store_projects.customer_id')
            //->where('store_projects.user_id', '=', $user->id)
            ->select('projects.created_at', DB::raw('projects.id as project_id'), 'projects.description', DB::raw('projects.name as project_name'), DB::raw('customers.name as customer_name'))
            //->orderBy('store_projects.project_id', 'DESC')
            ->get();

        return ProjectResource::collection($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return new CreateProjectResource(MetaDev::factory());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return new ProjectResource(Project::findOrFail($id));
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
        $project = Project::findOrFail($request->id);
        $project->fill($request->all());
        $project->save();
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
