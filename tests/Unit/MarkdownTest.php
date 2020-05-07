<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Markdown;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use PHPUnit\Framework\TestCase;

class MarkdownTest extends TestCase
{
    /** @test */
    public function it_can_convert_markdown()
    {
        $converter = new GithubFlavoredMarkdownConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        $markdown = new Markdown($converter);

        $this->assertSame("<h1>Hello World!</h1>\n", $markdown->toHtml('# Hello World!'));
    }
}
