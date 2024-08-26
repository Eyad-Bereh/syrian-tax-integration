<?php

namespace EyadBereh\SyrianTaxIntegration\DTO;

use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Data;

class LoginResponseData extends Data
{
    #[Computed]
    public readonly string $token;

    public function __construct(
        public readonly string $authorization_header,
        public readonly string $facility_name,
        public readonly int $response_code,
    ) {
        $this->token = Str::of($this->authorization_header)->after('Bearer')->trim();
    }
}
