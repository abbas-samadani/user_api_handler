<?php
namespace Plentific\UserApiHandler\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Plentific\UserApiHandler\contracts\ReqresServiceProvider;

class ReqresService implements ReqresServiceProvider
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://reqres.in/api';
    }


    public function getIterableFromProvider(string $uri, string $dataIndex = ''): ?array
    {
        $url = $this->baseUrl . $uri;
        $response = Http::get($url);
        if ($response->failed() || $response->json('name') == 'RequestError') {
            Log::channel('errors')->error(__METHOD__ . " @ {$this->getErrorMessage($response)}");
            return null;
        }

        empty($dataIndex) ? $responseData = $response->json() : $responseData = $response->json($dataIndex);
        return $responseData;
    }

    public function postParamsToProvider(string $uri, string $dataIndex = '', array $requestBody = []): ?array
    {
        $url = $this->baseUrl . $uri;
        $response = Http::post($url, $requestBody);
        if ($response->failed() || $response->json('name') == 'RequestError') {
            Log::channel('errors')->error(__METHOD__ . " @ {$this->getErrorMessage($response)}");
            return null;
        }

        empty($dataIndex) ? $responseData = $response->json() : $responseData = $response->json($dataIndex);
        return $responseData;
    }


    private function getErrorMessage(Response $response): string
    {
        $statusCode = $response->json('statusCode') ? $response->json('statusCode') . ' - ' : '';
        $statusText = $response->json('statusText') ? $response->json('statusText') . ' - ' : '';
        $message = $response->json('message') ?? 'Unknown Error';

        return "{$statusCode}{$statusText}{$message}";
    }
}
