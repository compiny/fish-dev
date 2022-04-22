<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = DB::table('store_projects')
            ->join('projects', 'store_projects.project_id', '=', 'projects.id')
            ->join('users', 'store_projects.user_id', '=', 'users.id')
            ->where('projects.id', '=', $this->id)
            ->select('projects.id', 'projects.name', 'users.name')
            ->orderBy('store_projects.id', 'asc')
            ->get()
        ->first();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'user' =>  $user
        ];
    }

}
