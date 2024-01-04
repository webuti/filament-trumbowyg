<?php

namespace Webuti\FilamentTrumbowyg;

use Filament\Forms\Components\Concerns\HasPlaceholder;

class FilamentTrumbowyg extends \Filament\Forms\Components\Field
{
    use HasPlaceholder;

    protected string $view = 'filament-trumbowyg::trumbowyg';
}
