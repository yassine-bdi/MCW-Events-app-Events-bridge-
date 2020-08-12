<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Session;
use App\Event; 
use Faker\Generator as Faker;

$factory->define(Session::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
       
        'content' => $faker->text,
        'event_id' => function () {
            return factory(App\Event::class)->create()->id;
         }
      
    ];
});
