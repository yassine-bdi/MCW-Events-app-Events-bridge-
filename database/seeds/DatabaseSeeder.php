<?php

use App\Event;
use App\Session; 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        factory('App\Session',50)->create(); 
        factory('App\Event',50)->create(); 
        factory('App\User',50)->create();
        factory('App\Ticket',50)->create(); 
    }  
        
}
