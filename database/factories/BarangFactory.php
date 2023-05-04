<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'stok' => $faker->randomDigitNotNull,
        'satuan' => $faker->randomDigitNotNull,
        'harga_beli' => $faker->randomDigitNotNull,
        'harga' => $faker->randomDigitNotNull,
        'tgl_expired' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
