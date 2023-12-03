<?php

namespace Mihaib\IccjService\Utils;

use Error;
use ZipArchive;

class ZipFile
{
    public function __construct(
        private string $sourcePath
    ) {
        if (!is_file($sourcePath)) {
            throw new Error("The file you're trying to unzip doesn't exist! Path: " . $sourcePath);
        }
    }

    public function unzip(string $destinationPath = null): string
    {
        $zip = new ZipArchive();
        $res = $zip->open($this->sourcePath);

        if ($res === true) {

            $destination = $destinationPath ?? dirname($this->sourcePath);

            $zip->extractTo($destination);
            $zip->close();

            return $destination;
        } else {;
            throw new Error("Zip file could not be open! Path: {$this->sourcePath}. Error: " . $zip->getStatusString());
        }
    }
}
