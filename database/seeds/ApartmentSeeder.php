<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newApartment = new Apartment();
            
            $newApartment->user_id = 1 ;
            $newApartment->title = $faker->words(7, true);
            $newApartment->num_rooms = rand(1, 10);
            $newApartment->num_beds = rand(1, 10);
            $newApartment->num_bath = rand(1, 4);
            $newApartment->square_footage = rand(20, 200);
            $newApartment->preview = 'https://placeimg.com/640/480/arch';
            $newApartment->visible = rand(0, 1);
            $newApartment->description = $faker->text();           
            $newApartment->save();
        }

        for ($i=0; $i < 10; $i++) { 
            $newApartment = new Apartment();
            
            $newApartment->user_id = 2 ;
            $newApartment->title = $faker->words(7, true);
            $newApartment->num_rooms = rand(1, 10);
            $newApartment->num_beds = rand(1, 10);
            $newApartment->num_bath = rand(1, 4);
            $newApartment->square_footage = rand(20, 200);
            $newApartment->preview = 'https://placeimg.com/640/480/arch';
            $newApartment->visible = rand(0, 1);
            $newApartment->description = $faker->text();           
            $newApartment->save();
        }
    }
}
