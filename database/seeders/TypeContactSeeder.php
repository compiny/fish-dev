<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_contacts')->insert([
            'name' => 'Моб.',
        ]);
        DB::table('type_contacts')->insert([
            'name' => 'Тел.',
        ]);
        DB::table('type_contacts')->insert([
            'name' => 'e-mail',
        ]);
    }
}
