<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'Принято',
            'deleted' => false,
        ]);
        DB::table('states')->insert([
            'name' => 'Диагностика',
            'deleted' => false,
        ]);
        DB::table('states')->insert([
            'name' => 'Ждем запчасти',
            'deleted' => false,
        ]);
        DB::table('states')->insert([
            'name' => 'Ожидание',
            'deleted' => true,
        ]);
    }
}
