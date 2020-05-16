<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pegawai;
use Faker\Generator as Faker;

$factory->define(Pegawai::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'job' => $faker->jobTitle,
        'gender' => $faker->randomElement(['L','P'])                
    ];
});
