<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lelang;
use Faker\Generator as Faker;

$factory->define(Lelang::class, function (Faker $faker) {

    return [
        'no_paket' => $faker->word,
        'tgl_deadline' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
