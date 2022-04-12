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
        $arrayAddress = [
            [
                "address" => "Via del Pigneto 130",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.887399522761754",
                "long" => "12.5336350690295",
            ],
            [
                "address" => "Via degli Scipioni 132",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.90927261468988",
                "long" => "12.460810640194515",
            ],
            [
                "address" => "Via Gregorio VII 396",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.89384487055451",
                "long" => "12.434835199714762",
            ],
            [
                "address" => "Via Magna Grecia 106",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.881487941022925",
                "long" => "12.507930940193772",
            ],
            [
                "address" => "Via Calatafimi 21",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.904990319019",
                "long" => "12.500068442317378",
            ],	
            [
                "address" => "Via Nino Bixio 74",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.893030495168865",
                "long" => "12.50805881320782",
            ],
            [
                "address" => "Via Giovanni Giolitti 255",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.897434385196235",
                "long" => "12.505783199714791",
            ],
            [
                "address" => "Via Giovanni Giolitti 255",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.897434385196235",
                "long" => "12.505783199714791",
            ],
            [
                "address" => "Via Buccari 3",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.912219728860876",
                "long" => "12.453737813208376",
            ],
            [
                "address" => "Via Sicilia 153",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.90951624288785",
                "long" => "12.49408515368758",
            ],
            [
                "address" => "Via Aurelia 831",
                "city" => "Roma",
                "country" => "Italia",
                "lat" => "41.88713532125407",
                "long" => "12.40593077087889",
            ],
            [
                "address" => "Via Marco Aurelio 8",
                "city" => "Milano",
                "country" => "Italia",
                "lat" => "45.49136262219643",
                "long" => "9.221676640296094",
            ],
            [
                "address" => "Via Fratelli Bandiera 24",
                "city" => "Bari",
                "country" => "Italia",
                "lat" => "41.12241526045473",
                "long" => "16.85426729599508",
            ],
            [
                "address" => "Piazza Garibaldi 136",
                "city" => "Napoli",
                "country" => "Italia",
                "lat" => "40.851708709284246",
                "long" => "14.26852034016602",
            ],
            [
                "address" => "Via Capolungo 24",
                "city" => "Genova",
                "country" => "Italia",
                "lat" => "44.381617851295104",
                "long" => "9.049431399784462",
            ],
            [
                "address" => "Cannaregio 2396",
                "city" => "Venezia",
                "country" => "Italia",
                "lat" => "45.44295127517326",
                "long" => "12.33311822680156",
            ],
            [
                "address" => "Strada Capo Murro di Porco 151",
                "city" => "Siracusa",
                "country" => "Italia",
                "lat" => "37.020328535076764",
                "long" => "15.301645570753816",
            ],
            [
                "address" => "Via Del Sole 8",
                "city" => "Firenze",
                "country" => "Italia",
                "lat" => "43.77250633196453",
                "long" => "11.25002150771198",
            ],
            [
                "address" => "Via Luigi Galvani 1",
                "city" => "Pisa",
                "country" => "Italia",
                "lat" => "43.718361897572265",
                "long" => "10.397740824902302",
            ],
            [
                "address" => "Corso Trieste 22",
                "city" => "Caserta",
                "country" => "Italia",
                "lat" => "41.072111863386446",
                "long" => "14.331767426678772",
            ],
            [
                "address" => "Via Gelsomino 3",
                "city" => "Polignano a Mare",
                "country" => "Italia",
                "lat" => "40.9948232924599",
                "long" => "17.221909472996302",
            ]
        ];

        for ($i=0; $i < 21; $i++) { 
            $newLocation = new Location();

            $newLocation->apartment_id = $i+1 ;
            $newLocation->address = $arrayAddress[$i]['address'];
            $newLocation->city = $arrayAddress[$i]['city'];
            $newLocation->country = $arrayAddress[$i]['country'];
            $newLocation->lat = $arrayAddress[$i]['lat'];
            $newLocation->lon = $arrayAddress[$i]['long'];
            $newLocation->save();
        }
    }
}
