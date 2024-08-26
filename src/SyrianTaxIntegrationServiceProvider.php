<?php

namespace EyadBereh\SyrianTaxIntegration;

use EyadBereh\SyrianTaxIntegration\Commands\SyrianTaxIntegrationCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SyrianTaxIntegrationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('syrian-tax-integration')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_syrian_tax_integration_table')
            ->hasCommand(SyrianTaxIntegrationCommand::class);
    }
}
