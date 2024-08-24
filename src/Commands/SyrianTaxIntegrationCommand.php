<?php

namespace EyadBereh\SyrianTaxIntegration\Commands;

use Illuminate\Console\Command;

class SyrianTaxIntegrationCommand extends Command
{
    public $signature = 'syrian-tax-integration';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');
    
        return self::SUCCESS;
    }
}
