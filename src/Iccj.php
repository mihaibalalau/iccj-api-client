<?php

namespace Mihaib\IccjService;

use Mihaib\IccjService\Services\IccjApi;
use Mihaib\IccjService\Services\IccjToateAniZip;
use Mihaib\IccjService\Services\IccjUpdateZip;

class Iccj
{
    public static function api(string $url): IccjApi
    {
        return new IccjApi($url);
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
