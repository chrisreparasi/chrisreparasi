<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pelanggan;
use Faker\Generator as Faker;

$factory->define(Pelanggan::class, function (Faker $faker) {
    return [
        'nm_plgn' => $faker->name,
        'no_telp' => $faker->e164PhoneNumber,
        'alamat' => $faker->address
    ];
});
