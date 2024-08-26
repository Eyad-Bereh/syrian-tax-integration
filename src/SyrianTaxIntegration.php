<?php

namespace EyadBereh\SyrianTaxIntegration;

use EyadBereh\SyrianTaxIntegration\DTO\InvoiceData;
use EyadBereh\SyrianTaxIntegration\DTO\LoginResponseData;
use EyadBereh\SyrianTaxIntegration\DTO\SendInvoiceResponseData;
use Illuminate\Support\Facades\Http;

class SyrianTaxIntegration {
    private string $username;
    private string $password;
    private string $tax_number;
    private const BASEURL = "http://185.216.133.4/liveapi/api";

    public function __construct()
    {
        $this->username = config('syrian-tax-integration.username');
        $this->password = config('syrian-tax-integration.password');
        $this->tax_number = config('syrian-tax-integration.tax_number');
    }

    public function withCredentials(string $username, string $password, string $tax_number) : static {
        $this->username = $username;
        $this->password = $password;
        $this->tax_number = $tax_number;
        return $this;
    }

    public function login(): LoginResponseData|false
    {
        $url = self::BASEURL . "/account/AccountingSoftwarelogin";
        $response = Http::post($url, [
            'userName' => $this->username,
            'passWord' => $this->password,
            'taxNumber' => $this->tax_number,
        ]);

        if ($response->json('succeed') === false) {
            return false;
        }

        $response = $response->json('data');
        $object = LoginResponseData::from([
            'authorization_header' => $response['token'],
            'facility_name' => $response['facilityName'],
            'response_code' => $response['responseCode'],
        ]);

        return $object;
    }

    public function sendInvoice(InvoiceData $data): SendInvoiceResponseData|false
    {
        $login_object = $this->login();
        if ($login_object === false) {
            return false;
        }

        $url = self::BASEURL . "/Bill/AddFullBill";
        $response = Http::withHeaders([
            'Authorization' => $login_object->authorization_header
        ])->post($url, [
            "billValue" => $data->invoice_value,
            "billNumber" => $data->invoice_number,
            "code" => $data->uuid,
            "currency" => $data->currency,
            "exProgram" => $data->program,
            "date" => $data->datetime
        ]);

        if ($response->json('succeed') === false) {
            return false;
        }

        $response = $response->json('data');
        $object = SendInvoiceResponseData::from([
            'code' => $response['code'],
            'datetime' => $response['billDate'],
            'random_number' => $response['randomNumber'],
            'response_code' => $response['responseCode'],
        ]);

        return $object;
    }
}
