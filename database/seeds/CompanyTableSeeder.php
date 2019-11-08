<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'Prospective',
                'city' => 'Jakarta',
                'address' => 'Jl Kh.syahdan nnp 66',
                'email' => 'prospective@prospec.com',
                'primary_contact' => '0819667275',
                'secondary_contact' => '0819667275',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
