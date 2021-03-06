<?php

use Illuminate\Database\Seeder;
use VulpeProject\Entities\Clients\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();
        factory(Client::class, 20)->create();
    }
}
