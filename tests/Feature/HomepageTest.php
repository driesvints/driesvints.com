<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visitors_can_see_the_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function visitors_can_see_posts_on_the_homepage()
    {
        $posts = Post::factory()->count(2)->create();
        $unpublished = Post::factory()->count(2)->unpublished()->create();

        $posts->each(fn (Post $post) => $this->get('/')->assertSee($post->title));
        $unpublished->each(fn (Post $post) => $this->get('/')->assertDontSee($post->title));
    }
}
