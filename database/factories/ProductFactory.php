<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'price' => $faker->randomFloat(2, 0, 10000),
        'image' => $faker->image('public/storage/images',640,480, null, false),
    ];
});
