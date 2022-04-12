<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pippo = new User();

        $pippo->name = 'pippo';
        $pippo->surname = 'pippo' ;
        $pippo->date_of_birth = '1990-12-01' ;
        $pippo->email = 'pippo@pippo.it' ;
        $pippo->password = Hash::make('pippopippo');

        $pippo->save();

        $pluto = new User();
        
        $pluto->name = 'pluto';
        $pluto->surname = 'pluto' ;
        $pluto->date_of_birth = '1980-10-20' ;
        $pluto->email = 'pluto@pluto.it' ;
        $pluto->password = Hash::make('plutopluto') ;

        $pluto->save();
    }

}
