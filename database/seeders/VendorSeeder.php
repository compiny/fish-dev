<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            'name' => 'SONY',
        ]);
        DB::table('vendors')->insert([
            'name' => 'LG',
        ]);
        DB::table('vendors')->insert([
            'name' => 'SAMSUNG',
        ]);
    }
}
