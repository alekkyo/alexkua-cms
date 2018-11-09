<?php

use Illuminate\Database\Seeder;

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
            'username'            => 'alexkua',
            'email'               => 'alexkua@me.com',
            'password'            => bcrypt('abc123'),
            'first_name'          => 'Alex',
            'last_name'           => 'Kua',
            'role'                => 2,
        ]);
    }
}
