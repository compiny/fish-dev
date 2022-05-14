<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dev extends Model
{
    use HasFactory;


    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public function bundles(): HasMany
    {
        return $this->hasMany(StoreBundle::class, 'dev_id', 'id');
    }

    //Resource for  Devs
    static function getJsonData($data)
    {
        return [
            'data' => $data,
            'spr' => [
                'vendors' => Vendor::all(),
                'bundles' => Bundle::all(),
                'types' => Type::all(),
                'troubles' => Trouble::all(),
                'states' => State::all('id', 'name')
            ]
        ];
    }
}
