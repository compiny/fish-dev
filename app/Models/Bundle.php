<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'type_id',
    ];

    public function tps(){
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
}
