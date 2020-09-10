<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Brand::class, function (Faker $faker) {
    return [
                'brand_name' => Str::random(10),
                'brand_logo' => Str::random(10),
                'brand_url'=>Str::random(10),
    ];
});
