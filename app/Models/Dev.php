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
        'customer_id',
        'n',
        'date',
        'type_id',
        'vendor_id',
        'troubles',
    ];

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
            'devs' => $data,
            'spr' => [
                'vendors' => Vendor::all(),
                'bundles' => Bundle::all(),
                'types' => Type::all(),
                'troubles' => Trouble::all(),
                'states' => State::all('id', 'name')
            ]
        ];
    }
    public function storeBundles($dev_id, $items){

    }

    private function prepareBundles($arr, $dev_id)
    {
        $newArr = [];
        $obj = new \stdClass();
        foreach ($arr as $item){
            $obj->bundle_id = $item->id;
            $obj->project_id = $dev_id;
            $newArr[] = $obj;
        }
        return $newArr;
    }
}
