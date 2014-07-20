<?php
namespace Dries\Content;

interface ContentRepositoryInterface
{
    /**
     * Returns a specific content item attribute.
     *
     * @param  string $key
     * @return mixed
     */
    public function getAttribute($key);

    /**
     * Sets a new value to a specific content item attribute.
     *
     * @param  string $key
     * @param  mixed $value
     * @return mixed
     */
    public function setAttribute($key, $value);
}
