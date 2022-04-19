<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Ноутбук',
        ]);
        DB::table('services')->insert([
            'name' => 'Планшет',
        ]);
        DB::table('services')->insert([
            'name' => 'Компьютер',
        ]);
    }
}
