<?php

namespace Mihaib\IccjService\Services;

use Generator;

class IccjToateService extends IccjZipFileService
{
    public function zipName(): string
    {
        return 'dosareSedinteToateAni.zip';
    }

    public function getUpdates(bool $fresh = true): Generator
    {
        if ($fresh) {
            $this->fetchZip();
            $this->unzip();
        }

        $filePath = dirname($this->zipPath()) . "/dosare.json";

        yield from $this->readFromJsonFile($filePath);
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
