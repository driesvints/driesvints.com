<?php



namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

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
    public function definition()
    {
        return [
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->words(5, true),
            'excerpt' => $this->faker->text(160),
            'content' => $this->faker->text(500),
            'published_at' => $this->faker->dateTimeBetween('-3 years', 'now'),
        ];
    }

    public function unpublished()
    {
        return $this->state(function () {
            return [
                'published_at' => null,
            ];
        });
    }
}
