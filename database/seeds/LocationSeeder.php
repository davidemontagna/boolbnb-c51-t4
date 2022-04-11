<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $newLocation = new Location();
            
            // Inserire un data con località vere

            $newLocation->apartment_id = $i+1 ;
            // $newLocation->address = ;
            // $newLocation->city = ;
            // $newLocation->country = ;
            // $newLocation->lat = ;
            // $newLocation->lon = ;
            $newLocation->save();
        }
    }
}
