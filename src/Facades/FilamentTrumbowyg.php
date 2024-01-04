<?php

namespace Webuti\FilamentTrumbowyg\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Webuti\FilamentTrumbowyg\FilamentTrumbowyg
 */
class FilamentTrumbowyg extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Webuti\FilamentTrumbowyg\FilamentTrumbowyg::class;
    }
}
