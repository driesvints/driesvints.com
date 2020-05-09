<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /** @test */
    public function it_can_detect_a_fb_video()
    {
        $post = new Post();

        $this->assertFalse($post->hasFacebookVideo());

        $post->content = '<div class="video fb-video">';

        $this->assertTrue($post->hasFacebookVideo());
    }
}
