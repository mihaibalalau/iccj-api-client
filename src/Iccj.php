<?php

namespace Mihaib\IccjService;

use Mihaib\IccjService\Services\IccjApi;
use Mihaib\IccjService\Services\IccjToateService;
use Mihaib\IccjService\Services\IccjUpdateService;

class Iccj
{
    public static function api(string $url): IccjApi
    {
        return new IccjApi($url);
    }

    public static function updateService(string $url, string $destPath): IccjUpdateService
    {
        return new IccjUpdateService($url, $destPath);
    }

    public static function toateService(string $url, string $destPath): IccjToateService
    {
        return new IccjToateService($url, $destPath);
    }
}
