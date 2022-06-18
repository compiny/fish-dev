<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class StoreBundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'dev_id',
        'bundle_id',
    ];

    public function getStoreBundle($id): Collection
    {
        $bundleSet = DB::table('store_bundles')
            ->leftJoin('bundles', 'store_bundles.bundle_id', '=', 'bundles.id')
            ->where('store_bundles.dev_id', '=', $id)
            ->select('bundles.id', 'bundles.name')
            ->get();

        $bundleSpr = Bundle::all();

        foreach ($bundleSpr as $item) {
            if($bundleSet){
                foreach ($bundleSet as $i){
                    if($item->id === $i->id ) {
                        $item->checked = true;
                    }
                }
            }
        }

        return $bundleSpr;
    }
}
