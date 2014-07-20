<?php
namespace Models;

class ContentModel extends BaseModel
{
    /**
     * The statuses for a posts.
     *
     * @var array
     */
    protected static $statuses = [
        'published' => 'Published',
        'draft'     => 'Draft',
    ];

    /**
     * Get a specific status for a post.
     *
     * @param  string $key
     * @return array
     */
    public static function getStatus($key)
    {
        return static::$statuses[$key];
    }

    /**
     * Get the possible statuses for a post.
     *
     * @return array
     */
    public static function getStatuses()
    {
        return static::$statuses;
    }
}
