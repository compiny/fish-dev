<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StoreTmc extends Model
{
    use HasFactory;

    //отбираем только товары по dev_id
    public function getTmcDev($id): Collection
    {
        return DB::table('store_tmcs')
            ->leftJoin('tmcs', 'store_tmcs.tmc_id', '=', 'tmcs.id')
            ->select('store_tmcs.id', DB::raw('tmcs.name as tmc_name'), 'store_tmcs.qn', 'store_tmcs.price' )
            ->where('dev_id', '=', $id)
            ->get();
    }
}
