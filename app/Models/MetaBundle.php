<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaBundle extends Model
{
    use HasFactory;
    public function __construct()
    {
        parent::__construct();
    }

    private static function types():array
    {
        return Type::all()->toArray();
    }

    private static function bundles():array
    {
        return Bundle::all()->toArray();
    }

    static function factory()
    {
        $arr = [
            'types' => self::types(),
            'bundles' => self::bundles()
        ];
        return $arr;
    }
}
