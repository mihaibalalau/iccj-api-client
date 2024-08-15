<?php

namespace Mihaib\IccjService;

use GuzzleHttp\Client;
use Mihaib\IccjService\Services\IccjApi;
use Mihaib\IccjService\Services\IccjToateAniZip;
use Mihaib\IccjService\Services\IccjUpdateZip;

class Iccj
{
    public static function api(string $url): IccjApi
    {
        $client = new Client([
            'base_uri' => $url
        ]);

        return new IccjApi($client);
    }

    public static function updateZip(string $url, string $destPath): IccjUpdateZip
    {
        return new IccjUpdateZip($url, $destPath);
    }

    public static function toateAniZip(string $url, string $destPath): IccjToateAniZip
    {
        return new IccjToateAniZip($url, $destPath);
    }
}
