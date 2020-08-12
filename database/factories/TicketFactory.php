<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use App\Event; 
use App\User; 
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
         },
         'event_id' => function () {
            return factory(App\Event::class)->create()->id;
         }
    ];
});
