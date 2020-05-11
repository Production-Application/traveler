<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'first_name' => 'Mamun',
            'last_name' => 'Chowdhury',
            'address' => '320/01, West Nayapara, Jamalpur',
            'email' => 'dev@mamun.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
