<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceSeeder extends Seeder
{
    
        
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['tv', 'piscina', 'parcheggio',
        'wi-fi', 'aria condizionata', 'colazione',
        'bbq','servizion in camera','cucina',
        'asciugacapelli', 'asciugamani'];

        $icons = ['fas fa-tv', 'fas fa-swimming-pool', 'fas fa-parking',
        'fas fa-wifi', 'fas fa-fan', 'fas fa-coffee',
        'fas fa-bacon','fas fa-bed', 'fas fa-blender',
        'fa-solid fa-wind', 'fa-brands fa-pied-piper-square'];

        for ($i=0; $i < 11; $i++) {

            $newService = new Service();
            $newService->name = $services[$i];
            $newService->icon = $icons[$i] ;
            $newService->save();
        }
    }
}
