<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'name' => 'Developement',
            ] 
        );
        DB::table('categories')->insert(
            
            [
                'name' => 'IT & Software',
            ],
            
        );
        DB::table('categories')->insert(
           
            [
                'name' => 'Business',
            ],
            
        );
        DB::table('categories')->insert(
            
            [
                'name' => 'Health & Fitness',
            ],
            
        );
        DB::table('categories')->insert(
            
            [
                'name' => 'Education',
            ],
            
        );
        DB::table('categories')->insert(
            [
                'name' => 'Marketing',
            ]
        );
    }
}
