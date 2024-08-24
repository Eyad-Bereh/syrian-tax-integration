<?php

namespace EyadBereh\SyrianTaxIntegration\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \EyadBereh\SyrianTaxIntegration\SyrianTaxIntegration
 */
class SyrianTaxIntegration extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \EyadBereh\SyrianTaxIntegration\SyrianTaxIntegration::class;
    }
}
