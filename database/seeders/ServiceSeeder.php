<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Замена дисплея',
            'price' => 100,
        ]);
        DB::table('services')->insert([
            'name' => 'Замена динамика',
            'price' => 100,
        ]);
        DB::table('services')->insert([
            'name' => 'Замена антенны',
            'price' => 100,
        ]);
    }
}
