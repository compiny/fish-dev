<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'phone',
        'adr',
        'email',
        'user_id',
        'emails',
        'phones'
    ];

    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class, 'customer_id', 'id');
    }

    public function emails(): HasMany
    {
        return $this->hasMany(Email::class, 'customer_id', 'id' );
    }
}
