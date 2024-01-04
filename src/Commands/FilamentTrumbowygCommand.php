<?php

namespace Webuti\FilamentTrumbowyg\Commands;

use Illuminate\Console\Command;

class FilamentTrumbowygCommand extends Command
{
    public $signature = 'filament-trumbowyg';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
