<?php

namespace App\Http\Resources;

use App\Models\TypeContact;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Contact;
use Illuminate\Support\Arr;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        //dd(Arr::pluck(Contact::typeContactEnum));

        return [
            'id' => $this->id,
            //'typeContact' => $this->typecontact->name,
            //'typeContactId' => $this->typecontact->id,
            'valueContact' => $this->valueContact,
            'customerName' => $this->customer->name,
            'customerId' => $this->customer->name,
            //'typeContacts' => TypeContact::all(),
        ];
    }
}
