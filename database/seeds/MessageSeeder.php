<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newMessage = new Message();
            
            $newMessage->apartment_id = rand(1, 20) ;
            $newMessage->content = $faker->text();
            $newMessage->sender_email = $faker->email();
            $newMessage->sender_name = $faker->name();
            $newMessage->visualized = rand(0, 1);
            $newMessage->answered = rand(0, 1);
            $newMessage->filed = 0;
            $newMessage->save();
        }
    }
}
