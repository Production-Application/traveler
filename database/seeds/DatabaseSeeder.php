<?php

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
        $this->call(AdminSeeder::class);

//        for ($i=0;$i <=15;$i++){
//            $this->call(UserSeeder::class);
//            $this->call(CategorySeeder::class);
//        }
    }
}
