<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create Entities for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(VulpeProject\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});



$factory->define(VulpeProject\Entities\Clients\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs' => $faker->sentence,
    ];
});

$factory->define(VulpeProject\Entities\Projects\Project::class, function (Faker\Generator $faker) {
    return [
            'owner_id' => $faker->numberBetween(1, 5),
            'client_id' => $faker->numberBetween(1, 20),
            'name' => $faker->name,
            'description' => $faker->sentence,
            'progress' => $faker->randomElement(['0%','25%', '50%', '75%','100%']),
            'status' => $faker->randomElement(['Nao iniciado', 'Iniciado', 'Andamento','Concluido']),
            'due_date' => $faker->date,

    ];
});
