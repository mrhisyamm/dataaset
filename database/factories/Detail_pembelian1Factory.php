<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Detail_pembelian1;
use Faker\Generator as Faker;

$factory->define(Detail_pembelian1::class, function (Faker $faker) {

    return [
        'subtotal' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'pembelians1_id' => $faker->randomDigitNotNull,
        'barangs_id' => $faker->randomDigitNotNull,
        'qty' => $faker->randomDigitNotNull
    ];
});
