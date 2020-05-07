<?php

namespace Tests\Feature;

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
}
