<?php

use Illuminate\Database\Seeder;

class StaffMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\StaffMember', 10)->create();
    }
}
