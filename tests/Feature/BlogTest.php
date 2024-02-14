<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visitors_can_view_a_single_post(): void
    {
        $post = Post::factory()->create();

        $this->get("/blog/{$post->slug}")
            ->assertSee($post->title)
            ->assertSee($post->published_at->format('F j, Y'));
    }

    /** @test */
    public function visitors_cannot_view_unpublished_posts(): void
    {
        $post = Post::factory()->unpublished()->create();

        $this->get("/blog/{$post->slug}")
            ->assertNotFound();
    }

    /** @test */
    public function visitors_cannot_view_scheduled_posts(): void
    {
        $post = Post::factory()->create(['published_at' => now()->addDay()]);

        $this->get("/blog/{$post->slug}")
            ->assertNotFound();
    }

    /** @test */
    public function admins_can_view_unpublished_posts(): void
    {
        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->unpublished()->create();

        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertSeeText('Draft: this post is not yet published.');
    }

    /** @test */
    public function admins_can_view_scheduled_posts(): void
    {
        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->create(['published_at' => now()->addDay()]);

        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertSeeText('Draft: this post is not yet published.');
    }

    /** @test */
    public function it_falls_back_on_content_for_excerpt(): void
    {
        $post = new Post();
        $post->excerpt = '';
        $post->content = 'Hello World!';

        $this->assertSame("Hello World!\n", $post->excerpt());
    }
}
