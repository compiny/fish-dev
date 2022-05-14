<?php

namespace App\Http\Resources;

use App\Models\Dev;
use http\Env\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Vendor;
use App\Models\Bundle;
use App\Models\Type;
use App\Models\Trouble;
use App\Models\State;
use Illuminate\Support\Facades\DB;

class DevCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return parent::toArray($request);
    }
/*
    public function with($request)
    {
        return [
            'spr' => [
                'vendors' => Vendor::all(),
                'bundles' => Bundle::all(),
                'types' => Type::all(),
                'troubles' => Trouble::all(),
                'states' => State::all('id', 'name')
            ],
        ];
    }
*/
}
