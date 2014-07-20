<?php

use Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'email'      => 'foo@example.com',
            'password'   => 'password',
            'first_name' => 'John',
            'last_name'  => 'Doe',
        ]);
    }
}
