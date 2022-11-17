<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StoreService extends Model
{
    use HasFactory;

    //отбираем только услуги по dev_id
    public function getServiceDev($id): Collection
    {
        return DB::table('store_services')
            ->leftJoin('services', 'store_services.service_id', '=', 'services.id')
            ->select('store_services.id', DB::raw('services.name as service_name'), 'store_services.qn', 'store_services.price' )
            ->where('dev_id', '=', $id)
            ->get();
    }
}
