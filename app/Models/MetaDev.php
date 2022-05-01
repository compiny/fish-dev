<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

class MetaDev extends Model
{
    use HasFactory;

    public function __construct()
    {
        parent::__construct();
    }

    private static function vendor():array
    {
        return Vendor::all()->toArray();
    }

    private static function troubles():array
    {
        return Trouble::all()->toArray();
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
            'vendors' => self::vendor(),
            'troubles' => self::troubles(),
            'types' => self::types(),
            'bundles' => self::bundles()
        ];
        return $arr;
    }
}
