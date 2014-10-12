<?php
namespace Dries\Content;

use DateTime;
use Prologue\Support\Collection as BaseCollection;

class Collection extends BaseCollection
{
    /**
     * Only return content which has already been published
     *
     * @return \Dries\Content\Collection
     */
    public function published()
    {
        return $this->filter(function ($item) {
            $date = new DateTime($item->date('Y-m-d H:i:s'));

            return ($date->getTimestamp() <= time() && $item->status === 'published');
        });
    }
}