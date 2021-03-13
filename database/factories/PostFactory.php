<?php

namespace Database\Factories;

use App\Models\Post;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->words(5, true),
            'excerpt' => $this->faker->text(160),
            'content' => $this->faker->text(500),
            'published_at' => $publishedAt = new CarbonImmutable($this->faker->dateTimeBetween('-3 years', 'now')), // Posted between 3 years ago and now.
            'created_at' => $this->faker->dateTimeBetween($publishedAt->subDays(7), $publishedAt), // Created between 7 days before publishing and the day of publication.
            'updated_at' => $this->faker->randomElement([ // Never updated, or on a day between publication date and a month later.
                $publishedAt,
                $this->faker->dateTimeBetween($publishedAt, $publishedAt->addDays(30)),
            ]),
        ];
    }

    public function unpublished(): self
    {
        return $this->state(function () {
            return [
                'published_at' => null,
            ];
        });
    }
}
