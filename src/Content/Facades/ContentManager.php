<?php
namespace Dries\Content\Facades;

use Illuminate\Support\Facades\Facade;

class ContentManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Dries\Content\Manager';
    }
}
