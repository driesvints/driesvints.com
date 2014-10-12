<?php
namespace spec\Dries\Content;

use Dries\Markdown\PhpMarkdownParser;
use Illuminate\Filesystem\Filesystem;
use Kurenai\Document;
use Kurenai\DocumentParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ManagerSpec extends ObjectBehavior
{
    function let()
    {
        $sources = ['posts' => [__DIR__ . '/data']];

        // Use the actual parser for more accurate tests.
        $parser = new DocumentParser(function() {
            return new Document(new PhpMarkdownParser);
        });

        $this->beConstructedWith($sources, new Filesystem, $parser);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Dries\Content\Manager');
    }

    function it_can_get_content()
    {
        $content = $this->get('posts');
        $content->shouldBeAnInstanceOf('Dries\Content\Collection');
        $content->first()->shouldBeAnInstanceOf('Dries\Content\Content');
    }
}
