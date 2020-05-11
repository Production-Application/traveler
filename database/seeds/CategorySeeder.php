<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => Str::random(5).' '.Str::random(5),
            'category_des' => Str::random(50),
            'category_img' => 'https://via.placeholder.com/600x250.png',
            'category_status' => '1',
            'slug' => strtolower(Str::slug(Str::random(8).' '.Str::random(5),'-')),
        ]);
    }
}
