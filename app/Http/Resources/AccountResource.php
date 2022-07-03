<?php

namespace App\Http\Resources;

use App\Models\Bank;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            'name' => $this->name,
            'accountNum' => $this->accountNum,
            'bank_id' => $this->id,
            'bankName' => $this->bank->name,
        ];
    }
    public function with($request)
    {
        return [
            'banks' => Bank::all(['id', 'name']),
        ];
    }
}
