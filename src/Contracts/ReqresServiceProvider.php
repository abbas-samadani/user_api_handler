<?php


namespace Plentific\UserApiHandler\contracts;

interface ReqresServiceProvider
{
    public function getIterableFromProvider(string $uri, string $dataIndex = ''): ?array;

    public function postParamsToProvider(string $uri, string $dataIndex = '', array $requestBody = []): ?array;

}
