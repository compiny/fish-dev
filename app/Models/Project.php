<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'user'
    ];
}
