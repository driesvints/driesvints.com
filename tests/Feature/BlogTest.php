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
    public function visitors_can_see_a_list_of_posts()
    {
        $posts = Post::factory()->count(5)->create();

        $posts->each(fn (Post $post) => $this->get('/blog')->assertSee($post->title));
    }

    /** @test */
    public function visitors_cannot_see_a_unpublished_posts_in_the_overview()
    {
        $posts = Post::factory()->count(2)->create();
        $unpublished = Post::factory()->count(2)->unpublished()->create();

        $posts->each(fn (Post $post) => $this->get('/blog')->assertSee($post->title));
        $unpublished->each(fn (Post $post) => $this->get('/blog')->assertDontSee($post->title));
    }

    /** @test */
    public function visitors_can_view_a_single_post()
    {
        $post = Post::factory()->create();

        $this->get("/blog/{$post->slug}")
            ->assertSee($post->title)
            ->assertSee($post->published_at->format('F j, Y'));
    }

    /** @test */
    public function visitors_cannot_view_unpublished_posts()
    {
        $post = Post::factory()->unpublished()->create();

        $this->get("/blog/{$post->slug}")
            ->assertNotFound();
    }

    /** @test */
    public function visitors_cannot_view_scheduled_posts()
    {
        $post = Post::factory()->create(['published_at' => now()->addDay()]);

        $this->get("/blog/{$post->slug}")
            ->assertNotFound();
    }

    /** @test */
    public function admins_can_view_unpublished_posts()
    {
        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->unpublished()->create();

        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertSeeText('Draft: this post is not yet published.');
    }

    /** @test */
    public function admins_can_view_scheduled_posts()
    {
        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->create(['published_at' => now()->addDay()]);

        $this->get("/blog/{$post->slug}")
            ->assertOk()
            ->assertSeeText('Draft: this post is not yet published.');
    }

    /** @test */
    public function visitors_can_see_a_previous_link()
    {
        $posts = Post::factory()->count(2)->create()->sortByDesc('published_at');
        $post = $posts->first();
        $previous = $posts->last();

        $this->get("/blog/{$post->slug}")
            ->assertSee($post->title)
            ->assertSee($previous->title)
            ->assertDontSee('Next post')
            ->assertSee('Previous post');
    }

    /** @test */
    public function visitors_can_see_a_next_link()
    {
        $posts = Post::factory()->count(2)->create()->sortByDesc('published_at');
        $post = $posts->last();
        $next = $posts->first();

        $this->get("/blog/{$post->slug}")
            ->assertSee($post->title)
            ->assertSee($next->title)
            ->assertSee('Next post')
            ->assertDontSee('Previous post');
    }

    /** @test */
    public function visitors_can_read_the_rss_feed()
    {
        $post = Post::factory()->create();

        $this->get('/blog/feed.atom')
            ->assertSee('The blog feed of Dries Vints')
            ->assertSee($post->title);
    }

    /** @test */
    public function visitors_cannot_see_unpublished_posts_in_the_feed()
    {
        $post = Post::factory()->create();
        $unpublished = Post::factory()->unpublished()->create();

        $this->get('/blog/feed.atom')
            ->assertSee('The blog feed of Dries Vints')
            ->assertSee($post->title)
            ->assertDontSee($unpublished->title);
    }

    /** @test */
    public function it_falls_back_on_content_for_excerpt()
    {
        $post = new Post();
        $post->excerpt = '';
        $post->content = 'Hello World!';

        $this->assertSame("Hello World!\n", $post->excerpt());
    }
}
