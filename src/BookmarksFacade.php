<?php

namespace Mortezaa97\Bookmarks;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mortezaa97\Bookmarks\Skeleton\SkeletonClass
 */
class BookmarksFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bookmarks';
    }
}
