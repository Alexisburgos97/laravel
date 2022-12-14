<?php

namespace Database\Seeders;

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
//        $this->call(UsersTableSeeder::class);
//        $this->call(CustomersTableSeeder::class);
//        $this->call(MaintenancesTableSeeder::class);

        $this->call([UsersTableSeeder::class, CustomersTableSeeder::class,MaintenancesTableSeeder::class]);

    }

}
