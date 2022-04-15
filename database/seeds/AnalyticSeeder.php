<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Analytic;


class AnalyticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $ipv4List = [];
        $a = 0;
        while ($a < 100) {
            $value = $faker->ipv4();
            if(!in_array($value, $ipv4List)){
                array_push($ipv4List, $value);
                $a++;
            } 
        }

        for ($i=0; $i < 50; $i++) { 
            $newAnalytic = new Analytic();
            
            $newAnalytic->apartment_id = rand(1, 21) ;
            $newAnalytic->search = 1;
            $newAnalytic->view = 0;
            $newAnalytic->like = 0;
            $newAnalytic->user_ip = $ipv4List[rand(0, 99)];
            $newAnalytic->save();
        }

        for ($i=0; $i < 50; $i++) { 
            $newAnalytic = new Analytic();
            
            $newAnalytic->apartment_id = rand(1, 21) ;
            $newAnalytic->search = 0;
            $newAnalytic->view = 1;
            $newAnalytic->like = 0;
            $newAnalytic->user_ip = $ipv4List[rand(0, 99)];
            $newAnalytic->save();
        }

        for ($i=0; $i < 50; $i++) { 
            $newAnalytic = new Analytic();
            
            $newAnalytic->apartment_id = rand(1, 21) ;
            $newAnalytic->search = 0;
            $newAnalytic->view = 0;
            $newAnalytic->like = 1;
            $newAnalytic->user_ip = $ipv4List[rand(0, 99)];
            $newAnalytic->save();
        }
    }
}
