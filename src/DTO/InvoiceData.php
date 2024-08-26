<?php

namespace EyadBereh\SyrianTaxIntegration\DTO;

use Spatie\LaravelData\Data;

class InvoiceData extends Data
{
    public readonly string $program;
    public function __construct(
        public readonly string $invoice_value,
        public readonly string $invoice_number,
        public readonly string $uuid,
        public readonly string $currency = 'sp',
        public ?string $datetime = null
    )
    {
        $this->program = config('syrian-tax-integration.program');
        $this->datetime ??= now();
    }
}