<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        $this->call(departaments::class);
        $this->call(profiles::class);
        $this->call(states::class);
        $this->call(userMaster::class);
        $this->call(Categories::class);


    }
}
