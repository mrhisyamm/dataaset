<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Returns;
use Faker\Generator as Faker;

$factory->define(Returns::class, function (Faker $faker) {

    return [
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'tanggal' => $faker->word,
        'pembayaran' => $faker->randomDigitNotNull,
        'total' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
