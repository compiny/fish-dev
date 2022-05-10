<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'nameOff' => $this->nameOff,
            'inn' => $this->inn,
            'kpp' => $this->kpp,
            'ogrn' => $this->ogrn,
            'email' => $this->email,
            'urAdr' => $this->urAdr,
            'factAdr' => $this->factAdr,
            'mailAdr' => $this->mailAdr,
            'phones' => $this->phones,
            'web' => $this->web,
            'about' => $this->about,
            'dataReg' => $this->dataReg,
            'dataClose' => $this->dataClose,
            'dirID' => $this->dirID,
            'buhID' => $this->buhID,
            'dirName' => $this->direktor->name,
            'buhName' => $this->buhgalter->name,
        ];
    }
}
