<?php
namespace spec\Dries\Content;

use Illuminate\Filesystem\Filesystem;
use Kurenai\DocumentParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ManagerSpec extends ObjectBehavior
{
    protected $sources;

    function let(DocumentParser $documentParser)
    {
        $this->sources = [
            'posts' => [realpath(__DIR__ . '/../../../content/posts')],
            'pages' => [realpath(__DIR__ . '/../../../content/pages')],
        ];

        $this->beConstructedWith($this->sources, new Filesystem, $documentParser);
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
