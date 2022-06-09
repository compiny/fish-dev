<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TmcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tmcs')->insert([
            'name' => 'Видеорегистраторы',
            'is_cat' => true,
        ]);
        DB::table('tmcs')->insert([
            'name' => 'Камеры видеонаблюдения',
            'is_cat' => true,
        ]);
        DB::table('tmcs')->insert([
            'name' => 'Блоки питания',
            'is_cat' => true,
        ]);
    }
}
