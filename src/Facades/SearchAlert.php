<?php

namespace Fevrok\SearchAlert\Facades;

use Illuminate\Support\Facades\Facade;

class SearchAlert extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SearchAlert';
    }
}
