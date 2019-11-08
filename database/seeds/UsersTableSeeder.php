<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'companies_id' => 1,
                'name' => 'Super Admin',
                'email' => 'superadmin@admin.com',
                'password' => bcrypt('boboho'),
                'address' => 'Address',
                'current_position' => 'Super Admin',
                'primary_contact' => '0819667275',
                'secondary_contact' => '0819667275',
                'is_active' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'role_id' => 2,
                'companies_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('boboho'),
                'address' => 'Address',
                'current_position' => 'Admin',
                'primary_contact' => '0819667275',
                'secondary_contact' => '0819667275',
                'is_active' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'role_id' => 3,
                'companies_id' => 1,
                'name' => 'Member',
                'email' => 'member@admin.com',
                'password' => bcrypt('boboho'),
                'address' => 'Address',
                'current_position' => 'member',
                'primary_contact' => '0819667275',
                'secondary_contact' => '0819667275',
                'is_active' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
