<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            [
                'name'                  => 'administrator',
                'display_name'          => 'Administrator',
                'description'           => 'Ability to view, create, edit, delete records and view all menu items.'
            ],

            [
                'name'                  => 'manager',
                'display_name'          => 'Manager',
                'description'           => 'Ability to edit,delete bookings.'
            ],

            [
                'name'                  => 'user',
                'display_name'          => 'User',
                'description'           => 'Ability to create bookings'
            ],

        ];

        DB::table('roles')->insert($roles);
    }
}