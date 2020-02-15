<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Filling',
            'Extraction',
            'Clean',
            'Cap',
            'Check up'
        ];

        foreach ($services as $service) {
            Service::create(['name' => $service]);
        }
    }
}
