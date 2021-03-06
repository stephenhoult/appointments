<?php

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
        $this->call(AppointmentsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(StaffMembersTableSeeder::class);
    }
}
