<?php

namespace Mihaib\IccjService\Services;

use Generator;
use Mihaib\IccjService\Dosar\Entities\DosarIccj;

class IccjToateService extends IccjZipFileService
{
    public function zipName(): string
    {
        return 'dosareSedinteToateAni.zip';
    }

    /**
     * @return DosarIccj[]
     */
    public function getToate(int|string $an, bool $fresh = true): Generator
    {
        if ($fresh) {
            $this->fetchZip();
            $this->unzip();
        }

        $filePath = dirname($this->zipPath()) . "/dosareToateAni/{$an}_dosare.json";

        yield from $this->readFromJsonFile($filePath);
    }
}
