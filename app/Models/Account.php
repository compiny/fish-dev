<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id',
        'accountNum',
        'bank_id',
        'customer_id',
        'customerName',
    ];

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
