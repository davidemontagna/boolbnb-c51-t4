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
        $randomData = [];

        for ($i=0; $i < 21; $i++) { 
            $rooms = rand(1, 10);
            $beds = ceil(($rooms / 2) + rand(0, 1));
            $baths = ceil(($rooms / 3) + rand(0, 1));

            $randomData = [
                'rooms' => $rooms,
                'beds' => $beds,
                'baths' => $baths,
            ];
        }

        for ($i=0; $i < 11; $i++) { 
            $newApartment = new Apartment();
            
            $newApartment->user_id = 1 ;
            $newApartment->title = $faker->words(5, true);
            $newApartment->num_rooms = $randomData[$i]['rooms'];
            $newApartment->num_beds = $randomData[$i]['beds'];
            $newApartment->num_bath = $randomData[$i]['baths'];
            $newApartment->num_guest = $randomData[$i]['beds'];
            $newApartment->price = 10 + ($randomData[$i]['beds'] * 15);
            $newApartment->square_footage = ($randomData[$i]['rooms'] * 12) + ($randomData[$i]['baths'] * 4);
            $newApartment->preview = 'https://placeimg.com/640/480/arch';
            $newApartment->visible = rand(0, 1);
            $newApartment->description = $faker->text();           
            $newApartment->save();
        }

        $rooms = rand(1, 10);
        $beds = ceil(($rooms / 2) + rand(0, 1));
        $baths = ceil(($rooms / 3) + rand(0, 1));

        for ($i=0; $i < 10; $i++) { 
            $newApartment = new Apartment();
            
            $newApartment->user_id = 2 ;
            $newApartment->title = $faker->words(5, true);
            $newApartment->num_rooms = $randomData[$i + 11]['rooms'];
            $newApartment->num_beds = $randomData[$i + 11 ]['beds'];
            $newApartment->num_bath = $randomData[$i + 11]['baths'];
            $newApartment->num_guest = $randomData[$i + 11]['beds'];
            $newApartment->price = 10 + ($randomData[$i + 11]['beds'] * 15);
            $newApartment->square_footage = ($randomData[$i + 11]['rooms'] * 12) + ($randomData[$i]['baths'] * 4);
            $newApartment->preview = 'https://placeimg.com/640/480/arch';
            $newApartment->visible = rand(0, 1);
            $newApartment->description = $faker->text();           
            $newApartment->save();
        }
    }
}
