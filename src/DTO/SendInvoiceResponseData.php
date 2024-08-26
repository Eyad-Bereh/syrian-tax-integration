<?php

namespace EyadBereh\SyrianTaxIntegration\DTO;

use Spatie\LaravelData\Data;

class SendInvoiceResponseData extends Data
{
    public function __construct(
        public readonly string $code,
        public readonly string $datetime,
        public readonly string $random_number,
        public readonly string $response_code,
    ) {}
}
