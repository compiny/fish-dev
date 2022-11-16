<?php

namespace App\Http\Resources;

use App\Models\Bundle;
use App\Models\Vendor;
use App\Models\Type;
use App\Models\Trouble;
use App\Models\State;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Session\Store;

class DevResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'n' => $this->n,
            'date' => $this->date,
            'sn' => $this->sn,
            'troubles_text' => $this->troubles,
            'type_id' => $this->type_id,
            'vendor_id' => $this->vendor_id,
            'final' => $this->final,
            'notification' => $this->notification,
            'services' => (new \App\Models\StoreService)->getServiceDev($this->id),
            'tmcs' => (new \App\Models\StoreTmc)->getTmcDev($this->id),
        ];
    }

    public function with($request)
    {
        return [
            'services' => (new \App\Models\StoreService)->getServiceDev($this->id),
            'states' => (new \App\Models\StoreState)->getStateDev($this->id),
            'bundles' => (new \App\Models\StoreBundle)->getStoreBundle($this->id),
            'customer' => $this->customer,
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
