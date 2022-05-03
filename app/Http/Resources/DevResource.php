<?php

namespace App\Http\Resources;

use App\Models\Vendor;
use App\Models\Type;
use App\Models\Trouble;
use Illuminate\Http\Resources\Json\JsonResource;

class DevResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'n' => $this->n,
            'date' => $this->date,
            'customer_name' => $this->customer->name,
            'customer_id' => $this->customer->id,
            'sn' => $this->sn,
            'phone' => $this->customer->phone,
            'troubles_text' => $this->troubles,
            'bundles' => $this->bundles,
            'type_id' => $this->type_id,
            'vendor_id' => $this->vendor_id,
            'final' => $this->final,
            'notification' => $this->notification,
            'address' => $this->address,
        ];
    }
    public function with($request)
    {
        return [
            'spr' => [
                'vendors' => Vendor::all(),
                'types' => Type::all(),
                'troubles' => Trouble::all()
            ],
        ];
    }
}
