<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('roles')->insert([
            'name' => 'Admin',
            'code' =>'admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'User',
            'code' =>'user',
        ]);

        DB::table('roles')->insert([
            'name' => 'Supplier',
            'code' =>'supplier',
        ]);*/

        /*DB::table('users')->insert([
            'name' => 'admin',
            'email' =>'admin@mail.com',
            'phone_number' => '1213232323',
            'gender' => 'm',
            'birth_date' => '2016-05-01',
            'password' => bcrypt('admin'),
            'role_id' => 1,
            'active' => 1,
        ]);*/

        /*DB::table('users')->insert([
            'name' => 'user',
            'email' =>'user@mail.com',
            'phone_number' => '009700598063017',
            'gender' => 'm',
            'birth_date' => '2016-05-01',
            'password' => bcrypt('user'),
            'role_id' => 2,
            'active' => 1,
        ]);*/

        /*DB::table('users')->insert([
            'name' => 'supplier',
            'email' =>'supplier@mail.com',
            'phone_number' => '009700598063018',
            'gender' => 'm',
            'birth_date' => '2016-05-01',
            'password' => bcrypt('supplier'),
            'role_id' => 3,
            'active' => 1,
        ]);*/
    }
}