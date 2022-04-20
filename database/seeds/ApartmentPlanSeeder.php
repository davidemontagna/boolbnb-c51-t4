<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApartmentPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $apartments = DB::table('apartments')->pluck('id')->toArray();
        $plans = DB::table('plans')->pluck('id')->toArray();
        $durations = DB::table('plans')->pluck('duration')->toArray();

        $pivots = [];
        
        $sponsorizedNum = rand(1, count($apartments));
        for($j = 0; $j < $sponsorizedNum; $j++)
        {
            $randomizedApartments = $apartments;
            shuffle($randomizedApartments);
            
            $randomizedPlans = $plans;
            shuffle($randomizedPlans);
            
            $randNum = rand(1, count($plans));
            for($i = 0; $i < $randNum; $i++) {
                $apartmentID = array_shift($randomizedApartments);
                $planID = array_shift($randomizedPlans);
                $dateCreation = Carbon::now();
                $dateStart = $dateCreation;

                foreach ($pivots as $pivot) {
                    if ($pivot['apartment_id'] == $apartmentID && $pivot['date_end'] > $dateStart) {
                        $dateStart = $pivot['date_end'];
                    }
                }
                
                $hours = $durations[$planID-1];
                $dateEnd = (clone $dateStart)->add(new DateInterval("PT{$hours}H"));

                $pivots[] = [
                    'apartment_id' => $apartmentID,
                    'plan_id' => $planID,
                    'date_start' => $dateStart,
                    'date_end' => $dateEnd,
                    'created_at' => $dateCreation,
                    'updated_at' => $dateCreation
                ];
            }
        }

        $idApartments  = array_column($pivots, 'apartment_id');
        $idPlans = array_column($pivots, 'plan_id');

        array_multisort($idApartments, SORT_NUMERIC, SORT_ASC, $idPlans, SORT_NUMERIC, SORT_ASC, $pivots);

        DB::table('apartment_plan')->insert($pivots);
    }
}
