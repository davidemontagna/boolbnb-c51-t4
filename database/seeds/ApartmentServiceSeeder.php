<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = DB::table('apartments')->pluck('id')->toArray();
        $services = DB::table('services')->pluck('id')->toArray();

        $pivots = [];
        foreach($apartments as $apartment)
        {
            $randNum = rand(1, count($services));
            $randomizedServices = $services;
            shuffle($randomizedServices);

            for($i = 0; $i < $randNum; $i++) {
                $pivots[] = [
                    'apartment_id' => $apartment,
                    'service_id' => array_shift($randomizedServices),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }
        }

        $idApartments  = array_column($pivots, 'apartment_id');
        $idServices = array_column($pivots, 'service_id');

        array_multisort($idApartments, SORT_NUMERIC, SORT_ASC, $idServices, SORT_NUMERIC, SORT_ASC, $pivots);

        DB::table('apartment_service')->insert($pivots);
    }
}
