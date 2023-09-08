<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void generate()
 */
class GentreeFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'gentree';
    }
}
