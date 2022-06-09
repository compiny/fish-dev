<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmc extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Tmc::class, 'id', 'cat_id');
    }
}
