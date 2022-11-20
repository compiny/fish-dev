<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Collection\Collection;

class Dev extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'n',
        'sn',
        'date',
        'troubles',
        'type_id',
        'vendor_id',
        'customer_id',
        'bundle_id',
    ];

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public function type(): HasOne
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
    public function vendor(): HasOne
    {
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }
    public function bundles(): HasMany
    {
        return $this->hasMany(StoreBundle::class, 'dev_id', 'id');
    }

    //Resource for  Devs
    static function getJsonData($data)
    {
        return [
            'devs' => $data,
            /*
            'spr' => [
                'vendors' => Vendor::all(),
                'bundles' => Bundle::all(),
                'types' => Type::all(),
                'troubles' => Trouble::all(),
                'states' => State::all('id', 'name')
            ]
            */
        ];
    }
}
