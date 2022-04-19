<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Project;
use App\Models\State;
use App\Models\StoreProject;
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
            StateSeeder::class,
            TroubleSeeder::class,
            VendorSeeder::class,
            ServiceSeeder::class,
            TypeSeeder::class,
        ]);
         User::factory(10)->create();
         Customer::factory(100)->create();
         Project::factory(100)->create();
         StoreProject::factory(100)->create();
         Contact::factory(100)->create();
    }
}
