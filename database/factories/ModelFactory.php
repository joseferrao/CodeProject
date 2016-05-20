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
            'progress' => rand(1,100),
            'status' => rand(1,3),
            'due_date' => $faker->dateTime('now')

    ];
});

$factory->define(VulpeProject\Entities\Projects\ProjectNote::class, function (Faker\Generator $faker) {
    return [
            'project_id' => rand(1,10),
            'title' => $faker->word,
            'note' => $faker->sentence
    ];
});

$factory->define(VulpeProject\Entities\Projects\ProjectTask::class, function (Faker\Generator $faker) {
    return [
            'project_id' => rand(1,10),
            'name' => $faker->word,
            'start_date' => $faker->date(),
            'due_date' => $faker->date(),
            'status' => rand(1,3),
    ];
});

$factory->define(VulpeProject\Entities\Projects\ProjectMember::class, function (Faker\Generator $faker) {
    return [
            'project_id' => rand(1,10),
            'user_id'   => rand(1,11)
    ];
});
