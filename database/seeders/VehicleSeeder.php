<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        static $names = [
            'Scraper',
            'Wheel Loader',
            'Excavator',
            'Dump Truck',
            'Bulldozer',
            'Roller',
            'Manhauler', 'Manhauler', 'Manhauler', 'Manhauler', 'Manhauler', 'Manhauler', 'Manhauler',
        ];

        static $services = [
            '09.00 - 15.00',
            '15.00 - 21.00',
            '21.00 - 03.00',
            '03.00 - 09.00'
        ];

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 30; $i++)
        {
            DB::table('vehicles')->insert([
                'name' => $names[$faker->numberBetween(0,12)],
                'gas_consumption' => $faker->numberBetween(200,300) . ' Litre/Hour',
                'service_hours' => $services[$faker->numberBetween(0,3)]
            ]);
        }
    }
}
