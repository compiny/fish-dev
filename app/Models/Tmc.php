<?php

namespace App\Models;

use App\Http\Resources\TmcCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmc extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->hasOne(Tmc::class, 'id', 'cat_id');
    }

    public function getData($query): TmcCollection
    {
        if(!$query->cat_id){
            $data = Tmc::where('is_cat', false)
                ->limit($query->limit)
                ->get();
        }
        if($query->cat_id){
            $data = Tmc::where('is_cat', false)
                ->where('cat_id', $query->cat_id)
                ->paginate($query->limit);
        }

        return new TmcCollection($data);
    }
}
