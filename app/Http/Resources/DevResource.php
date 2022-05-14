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
            'customer' => $this->customer,
            'sn' => $this->sn,
            'troubles_text' => $this->troubles,
            'bundles' => (new \App\Models\StoreBundle)->getStoreBundle($this->id),
            'type_id' => $this->type_id,
            'vendor_id' => $this->vendor_id,
            'final' => $this->final,
            'notification' => $this->notification,
            'states' => (new \App\Models\StoreState)->getStateDev($this->id)
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
