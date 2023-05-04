<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Detail_returns_penjualans;
use Faker\Generator as Faker;

$factory->define(Detail_returns_penjualans::class, function (Faker $faker) {

    return [
        'tanggal' => $faker->randomDigitNotNull,
        'pembayaran' => $faker->randomDigitNotNull,
        'total' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'returns_id' => $faker->randomDigitNotNull
    ];
});
