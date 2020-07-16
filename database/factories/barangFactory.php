<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'id_plgn' => $faker->numberBetween($min = 1, $max = 20),
        'nm_plgn' => $faker->name,
        'nm_brg' => $faker->word,
        'jns_brg' => $faker->text($maxNbChars = 20),
        'jns_prbkn' => $faker->text($maxNbChars = 20),
        'harga' => $faker->numberBetween($min = 50000, $max = 300000),
        'status' => $faker->numberBetween($min = 0, $max = 1),
        'tgl_masuk' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = '-1 years'),
        'tgl_keluar' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
    ];
});
