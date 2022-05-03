<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dev extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public function bundles()
    {
        return $this->hasMany(StoreBundle::class, 'dev_id', 'id');
    }
}
