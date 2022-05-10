<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'nameOff',
        'inn',
        'kpp',
        'ogrn',
        'phones',
        'urAdr',
        'factAdr',
        'email',
        'offAdr',
        'mailAdr',
        'buhID',
        'dirID',
        'ownerID',
        'about',
        'web',
    ];

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
