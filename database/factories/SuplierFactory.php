<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Suplier;
use Faker\Generator as Faker;

$factory->define(Suplier::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'alamat' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
