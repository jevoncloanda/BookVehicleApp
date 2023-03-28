<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++)
        {
            DB::table('invoices')->insert([
                'vehicle_id' => $faker->numberBetween(1,30),
                'driver_id' => $faker->numberBetween(1, 10),
                'user_id' => $faker->numberBetween(2, 6),
                'status' => 'Pending'
            ]);
        }
    }
}
