<?php

use Illuminate\Database\Seeder;
use VulpeProject\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        factory(User::class)->create([
            'name' => 'Jose dos Santos',
            'email' => 'joses.ferrao@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 10)->create();
    }
}
