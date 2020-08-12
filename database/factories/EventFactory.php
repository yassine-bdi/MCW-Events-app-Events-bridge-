<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\User; 
use App\Model;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    
    return [
        
        'title' => $faker->sentence,
        'brief' => $faker->text,
        'content' => $faker->realText,
        'date' => $faker->date(),
        'country' => $faker->country,
        'city' => $faker->city,
        'speaker'=> $faker->lastname,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
         }
        
        
       
    ];
});
