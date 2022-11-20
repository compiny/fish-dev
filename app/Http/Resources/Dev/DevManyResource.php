<?php

namespace App\Http\Resources\Dev;

use App\Models\Bundle;
use App\Models\Vendor;
use App\Models\Type;
use App\Models\Trouble;
use App\Models\State;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Session\Store;

class DevManyResource extends JsonResource
{

    public function toArray($request): array
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'n' => $this->n,
            'date' => $this->date,
            'sn' => $this->sn,
            'troubles_text' => $this->troubles,
            //'type' => $this->type,
            //'vendor' => $this->vendor,
            'final' => $this->final,
            //'notification' => $this->notification,
            //'services' => (new \App\Models\StoreService)->getServiceDev($this->id),
            //'tmcs' => (new \App\Models\StoreTmc)->getTmcDev($this->id),
            'customer' => $this->customer,
            //'states' => (new \App\Models\StoreState)->getStateDev($this->id),
            //'services' => (new \App\Models\StoreService)->getServiceDev($this->id),
            //'bundles' => (new \App\Models\StoreBundle)->getStoreBundle($this->id),
        ];

    }

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

}
