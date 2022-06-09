<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StoreState extends Model
{
    use HasFactory;

    protected $fillable = [
        'dev_id',
        'state_id',
        'user_id',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function getStateDev($id): Collection
    {
        return DB::table('store_states')
            ->leftJoin('states', 'store_states.state_id', '=', 'states.id')
            ->leftJoin('users', 'store_states.user_id', '=', 'users.id')
            ->select(DB::raw('users.name as user_name'), DB::raw('states.name as state_name'), DB::raw('store_states.created_at as state_date'))
            ->where('dev_id', '=', $id)
            ->get();
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
/*
    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
*/
}
