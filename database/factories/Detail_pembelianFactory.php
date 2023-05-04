<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\detail_pembelian;
use Faker\Generator as Faker;

$factory->define(detail_pembelian::class, function (Faker $faker) {

    return [
        'qty' => $faker->randomDigitNotNull,
        'subtotal' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'pembelians_id' => $faker->randomDigitNotNull,
        'barangs_id' => $faker->randomDigitNotNull
    ];
});
