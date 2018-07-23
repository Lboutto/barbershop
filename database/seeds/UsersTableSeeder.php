<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'       => 'Admin',
            'email'      => 'admin@mail.com',
            'password' => bcrypt('123456'),
        ]);

        // Assign Role
        $user->assignRole('administrator');

        $user = User::create([
            'name'       => 'Worker',
            'email'      => 'worker@mail.com',
            'password' => bcrypt('123456'),
        ]);

        // Assign Role
        $user->assignRole('worker');
    }
}
