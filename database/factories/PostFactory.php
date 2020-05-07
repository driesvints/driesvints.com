<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'title' => $faker->words(5, true),
        'excerpt' => $faker->text(20),
        'content' => $faker->text(500),
        'published_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
