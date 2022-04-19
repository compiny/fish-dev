<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TroubleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('troubles')->insert([
            'name' => 'Разбит дисплей',
        ]);
        DB::table('troubles')->insert([
            'name' => 'Нет звука',
        ]);
        DB::table('troubles')->insert([
            'name' => 'Не включается',
        ]);
    }
}
