<?php

namespace Mihaib\IccjService\Services;

use Generator;
use Mihaib\IccjService\Dosar\Entities\DosarIccj;
use Throwable;

class IccjToateAniZip extends IccjZipFileService
{
    public function zipName(): string
    {
        return 'dosareSedinteToateAni.zip';
    }

    /**
     * @return DosarIccj[]
     */
    public function getAn(int|string $an, bool $fresh = true): Generator
    {
        if ($fresh) {
            $this->fetchZip();
            $this->unzip();
        }

        $filePath = dirname($this->zipPath()) . "/{$an}_dosare.json";

        yield from $this->readFromJsonFile($filePath);
    }

    /**
     * @return DosarIccj[]
     */
    public function getAll(): Generator
    {
        $year = 1992;

        try {

            while (true) {
                yield from $this->getAn($year++);
            }
        } catch (Throwable $e) {
        }
    }
}
