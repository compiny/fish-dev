<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function direktor()
    {
        return $this->hasOne(User::class, 'id', 'dirID');
    }

    public function buhgalter()
    {
        return $this->hasOne(User::class, 'id', 'buhID');
    }
}
