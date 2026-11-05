<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function visitors_can_see_the_homepage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
