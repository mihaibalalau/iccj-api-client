<?php

namespace Mihaib\IccjService;

use Generator;
use Mihaib\IccjService\Services\IccjZipFileService;

class IccjUpdateService extends IccjZipFileService
{
    public function zipName(): string
    {
        return 'dosareSedinteUpdate.zip';
    }

    /**
     * @return DosarIccj[]
     */
    public function getUpdates(bool $fresh = true): Generator
    {
        if ($fresh) {
            $this->fetchZip();
            $this->unzip();
        }

        $filePath = dirname($this->zipPath()) . "/dosare.json";

        yield from $this->readFromJsonFile($filePath);
    }
}
