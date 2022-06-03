<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add to dummy data for categories
        // DB::table('categories')->truncate();

        $categories = [
            [
                'name'        => 'modern trade',
                'status'        => '1',
            ],
            [
                'name'        => 'traditional trade',
                'status'        => '1',
            ],
            [
                'name'        => 'horela',
                'status'        => '1',
            ],



        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
