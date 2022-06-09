<?php

namespace Database\Seeders;

use App\Models\Bundle;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Dev;
use App\Models\Project;
use App\Models\Setting;
use App\Models\StoreBundle;
use App\Models\StoreProject;
use App\Models\StoreState;
use App\Models\Tmc;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            StateSeeder::class,
            TroubleSeeder::class,
            VendorSeeder::class,
            ServiceSeeder::class,
            TypeSeeder::class,
            SettingSeeder::class,
        ]);
        User::factory(10)->create();
        $this->call([
            CompanySeeder::class,
            TmcSeeder::class,
        ]);
         Customer::factory(100)->create();
         Project::factory(100)->create();
         StoreProject::factory(100)->create();
         Contact::factory(100)->create();
         Bundle::factory(10)->create();
         Dev::factory(100)->create();
         StoreBundle::factory(100)->create();
         StoreState::factory(100)->create();
         Tmc::factory(100)->create();
    }
}
