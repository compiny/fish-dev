<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'ООО Видеоспецсервис',
            'nameOff' => 'ООО Видеоспецсервис',
            'inn' => '5440110331',
            'kpp' => '544001001',
            'ogrn' => '1125483002765',
            'urAdr' => '631521 Новосибирская область, г. Черепаново, ул. Микрорайон д. 10, кв. 22',
            'mailAdr' => '630083 г. Новосибирск, ул. Грибоедова д. 2Б',
            'factAdr' => '630083 г. Новосибирск, ул. Грибоедова д. 2Б',
            'email' => 'video@vss-nsk.ru',
            'phones' => '7 (383) 207-80-19, +7 953 861-79-20',
            'web' => 'https://vss-nsk.ru',
            'about' => 'Монтаж систем безопасности и связи',
            'dateReg' => '15.12.2000',
            'dirID' => 1,
            'buhID' => 1,
            'ownerID' => 1,
        ]);
        DB::table('companies')->insert([
            'name' => 'ООО Компини',
            'nameOff' => 'ООО Компини',
            'inn' => '5440126211',
            'kpp' => '544001001',
            'ogrn' => '1125483002765',
            'urAdr' => '631521 Новосибирская область, г. Черепаново, ул. Микрорайон д. 10, кв. 22',
            'mailAdr' => '630083 г. Новосибирск, ул. Грибоедова д. 2Б',
            'factAdr' => '630083 г. Новосибирск, ул. Грибоедова д. 2Б',
            'email' => 'video@vss-nsk.ru',
            'phones' => '7 (383) 207-80-19, +7 953 861-79-20',
            'web' => 'https://vss-nsk.ru',
            'about' => 'Монтаж систем безопасности и связи',
            'dateReg' => '15.12.2000',
            'dirID' => 1,
            'buhID' => 1,
            'ownerID' => 1,
        ]);
    }
}
