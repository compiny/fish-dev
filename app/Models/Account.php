<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
