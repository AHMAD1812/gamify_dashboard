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
                'image'=>'categories/developement.png'
            ] 
        );
        DB::table('categories')->insert(
            
            [
                'name' => 'IT & Software',
                'image'=>'categories/software.png'
            ],
            
        );
        DB::table('categories')->insert(
           
            [
                'name' => 'Business',
                'image'=>'categories/business.png'
            ],
            
        );
        DB::table('categories')->insert(
            
            [
                'name' => 'Health & Fitness',
                'image'=>'categories/health.png'
            ],
            
        );
        DB::table('categories')->insert(
            
            [
                'name' => 'Education',
                'image'=>'categories/education.png'
            ],
            
        );
        DB::table('categories')->insert(
            [
                'name' => 'Marketing',
                'image'=>'categories/marketing.png'
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => 'Designing',
                'image'=>'categories/designing.png'
            ]
        );
    }
}
