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

    /**
     * Filters content from a specific content type based on a tag
     *
     * @param string $tag
     * @param string $orderBy
     * @param string $direction
     * @return \Dries\Content\Collection
     */
    public function tagged($tag, $orderBy = 'date', $direction = 'desc')
    {
        // Only return published and tagged content.
        return $this->published()->filter(function ($item) use ($tag) {
            return in_array($tag, $item->tags);
        })->orderBy($orderBy, $direction);
    }
}