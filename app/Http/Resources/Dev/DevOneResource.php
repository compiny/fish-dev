<?php

namespace App\Http\Resources\Dev;

use App\Models\Bundle;
use App\Models\Vendor;
use App\Models\Type;
use App\Models\Trouble;
use App\Models\State;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Session\Store;

class DevOneResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'n' => $this->n,
            'date' => $this->date,
            'sn' => $this->sn,
            'troubles_text' => $this->troubles,
            'type' => $this->type,
            'vendor' => $this->vendor,
            'final' => $this->final,
            'notification' => $this->notification,
            'services' => (new \App\Models\StoreService)->getServiceDev($this->id),
            'tmcs' => (new \App\Models\StoreTmc)->getTmcDev($this->id),
            'customer' => $this->customer,
            'states' => (new \App\Models\StoreState)->getStateDev($this->id),
            'bundles' => (new \App\Models\StoreBundle)->getStoreBundle($this->id),
            'spr_types' => Type::all(),
            'spr_vendors' => Vendor::all(),
            'spr_bundles' => Bundle::all(),
            'spr_states' => State::all(),
            'spr_troubles' => Trouble::all(),
        ];

    }
}
