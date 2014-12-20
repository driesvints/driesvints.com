<?php
namespace spec\Dries\Content;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

date_default_timezone_set('UTC');

class CollectionSpec extends ObjectBehavior
{
    function let()
    {
        $contentUnpublished = new ContentStub;
        $contentUnpublished->status = 'unpublished';

        $contentFutureDate = new ContentStub;
        $contentFutureDate->date = '2999-01-01 00:00:00';

        $items = [new ContentStub, $contentUnpublished, $contentFutureDate];

        $this->beConstructedWith($items);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Dries\Content\Collection');
    }

    function it_should_filter_published_items()
    {
        $this->published()->shouldHaveCount(1);
    }
}

class ContentStub
{
    public $status = 'published';
    public $date = '1999-01-01 00:00:00';

    public function date()
    {
        return $this->date;
    }
}
