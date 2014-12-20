<?php
namespace spec\Dries\Content;

use Dries\Content\Markdown\LeagueCommonMarkParser;
use Illuminate\Filesystem\Filesystem;
use Kurenai\Document;
use Kurenai\DocumentParser;
use League\CommonMark\CommonMarkConverter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ManagerSpec extends ObjectBehavior
{
    function let()
    {
        $sources = ['posts' => [__DIR__ . '/data']];

        // Use the actual parser for more accurate tests.
        $parser = new DocumentParser(function() {
            return new Document(new LeagueCommonMarkParser(new CommonMarkConverter()));
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

    function it_can_filter_tagged_content()
    {
        $this->tagged('posts', 'foo')->shouldHaveCount(2);
    }
}
