<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Detail_penjualan1;
use Faker\Generator as Faker;

$factory->define(Detail_penjualan1::class, function (Faker $faker) {

    return [
        'qty' => $faker->randomDigitNotNull,
        'subtotal' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'penjualan1s_id' => $faker->randomDigitNotNull,
        'barangs_id' => $faker->randomDigitNotNull
    ];
});
