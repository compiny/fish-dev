<?php

namespace App\Http\Resources;

use App\Models\Tmc;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class TmcCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    public function with($request)
    {
        return [
            'cat' => DB::table('tmcs')
                ->where('is_cat', '=', true)
                ->where('cat_id', '=', null)
                ->get(),
        ];
    }
}
