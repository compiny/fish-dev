<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchCustomerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $key_name = $request->query('key_name');
        $customers = DB::table('customers')
            ->whereFullText('name', $key_name)
            ->get();
        return $customers;
        return CustomerResource::collection($customers);
    }
}
