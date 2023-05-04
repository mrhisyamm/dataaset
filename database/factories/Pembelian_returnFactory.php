<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pembelian_return;
use Faker\Generator as Faker;

$factory->define(Pembelian_return::class, function (Faker $faker) {

    return [
        'tempat' => $faker->word,
        'tanggal' => $faker->word,
        'total' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'supliers_id' => $faker->randomDigitNotNull
    ];
});
