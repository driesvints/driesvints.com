<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function visitors_can_view_a_single_post(): void
    {
        $post = Post::factory()->create();

        $this->get("/blog/{$post->slug}")
            ->assertSee($post->title)
            ->assertSee($post->published_at->format('F j, Y'));
    }

    #[Test]
    public function visitors_cannot_view_unpublished_posts(): void
    {
        $post = Post::factory()->unpublished()->create();

        $this->get("/blog/{$post->slug}")
            ->assertNotFound();
    }

    #[Test]
    public function visitors_cannot_view_scheduled_posts(): void
    {
        $post = Post::factory()->create(['published_at' => now()->addDay()]);

        $this->get("/blog/{$post->slug}")
            ->assertNotFound();
    }

    #[Test]
    public function admins_can_view_unpublished_posts(): void
    {
        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->unpublished()->create();

        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertSeeText('Draft: this post is not yet published.');
    }

    #[Test]
    public function admins_can_view_scheduled_posts(): void
    {
        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->create(['published_at' => now()->addDay()]);

        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertSeeText('Draft: this post is not yet published.');
    }

    #[Test]
    public function cached_posts_are_refreshed_when_updated(): void
    {
        config([
            'responsecache.enabled' => true,
            'responsecache.cache.store' => 'array',
            'responsecache.debug.enabled' => true,
        ]);

        $post = Post::factory()->create(['content' => 'Original article content.']);

        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertHeader('X-Cache-Status', 'MISS')
            ->assertSeeText('Original article content.');

        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertHeader('X-Cache-Status', 'HIT')
            ->assertSeeText('Original article content.');

        $post->content = 'Revised article content.';
        $post->save();

        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertSeeText('Revised article content.')
            ->assertDontSeeText('Original article content.');
    }

    #[Test]
    public function cached_admin_previews_are_not_visible_to_guests(): void
    {
        config([
            'responsecache.enabled' => true,
            'responsecache.cache.store' => 'array',
            'responsecache.debug.enabled' => true,
        ]);

        $post = Post::factory()->unpublished()->create();
        $this->be(User::factory()->create());

        $this->get("/blog/{$post->slug}")->assertOk();
        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertHeader('X-Cache-Status', 'HIT');

        $this->app['auth']->logout();

        $this->get("/blog/{$post->slug}")->assertNotFound();
    }

    #[Test]
    public function it_falls_back_on_content_for_excerpt(): void
    {
        $post = new Post;
        $post->excerpt = '';
        $post->content = 'Hello World!';

        $this->assertSame("Hello World!\n", $post->excerpt());
    }
}
