<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Penawaran;
use Faker\Generator as Faker;

$factory->define(Penawaran::class, function (Faker $faker) {

    return [
        'harga_penawaran' => $faker->randomDigitNotNull,
        'is_selected' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
