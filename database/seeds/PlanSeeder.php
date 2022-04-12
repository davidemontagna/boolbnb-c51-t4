<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = ['2.99', '5.99', '9.99'];
        $durations = ['24', '72', '144'];

        for ($i=0; $i < 3; $i++) {

            $newPlan = new Plan();
            $newPlan->price = $plans[$i];
            $newPlan->duration = $durations[$i] ;
            $newPlan->save();
        }
    }
}
