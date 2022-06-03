<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add to dummy data for categories
        // DB::table('customers')->truncate();

        $customers = [
            [
                'name'        => 'fahath',
                'address'        => 'deira',
                'city'        => 'dubai',
                'mobile'        => '789456123',
                'email'        => 'fahath@gmail.com',
                'category_id'        => '1',

            ],

            [
                'name'        => 'maddy',
                'address'        => 'deira',
                'city'        => 'dubai',
                'mobile'        => '789456123',
                'email'        => 'dummy7@gmail.com',
                'category_id'        => '2',

            ],

            [
                'name'        => 'sarukhan',
                'address'        => 'deira',
                'city'        => 'dubai',
                'mobile'        => '789456123',
                'email'        => 'dummy6@gmail.com',
                'category_id'        => '3',

            ],

            [
                'name'        => 'ajith',
                'address'        => 'deira',
                'city'        => 'dubai',
                'mobile'        => '789456123',
                'email'        => 'dummy5@gmail.com',
                'category_id'        => '1',

            ],

            [
                'name'        => 'vijay',
                'address'        => 'deira',
                'city'        => 'dubai',
                'mobile'        => '789456123',
                'email'        => 'dummy3@gmail.com',
                'category_id'        => '2',

            ],

            [
                'name'        => 'suriya',
                'address'        => 'deira',
                'city'        => 'dubai',
                'mobile'        => '789456123',
                'email'        => 'dummy2@gmail.com',
                'category_id'        => '1',

            ],

        ];

        foreach ($customers as $customer) {
            DB::table('customers')->insert($customer);
        }
    }
}
