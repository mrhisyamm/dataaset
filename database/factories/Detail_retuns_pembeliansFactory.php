<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Detail_retuns_pembelians;
use Faker\Generator as Faker;

$factory->define(Detail_retuns_pembelians::class, function (Faker $faker) {

    return [
        'tempat' => $faker->word,
        'tanggal' => $faker->word,
        'total' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'supliers' => $faker->randomDigitNotNull
    ];
});
