<?php

namespace Mihaib\IccjService\Services;

use Generator;
use GuzzleHttp\Client;
use Mihaib\IccjService\Dosar\Entities\DosarIccj;
use Mihaib\IccjService\Dosar\Values\CaleAtacDosarIccj;
use Mihaib\IccjService\Dosar\Values\ParteDosarIccj;
use Mihaib\IccjService\Dosar\Values\TermenDosarIccj;
use Mihaib\IccjService\Utils\ZipFile;
use Mihaib\LargeJsonParser\LargeJsonFileIterator;

abstract class IccjZipFileService
{
    private Client $client;

    public function __construct(
        string $url,
        private string $destPath
    ) {
        if ($destPath[strlen($destPath) - 1] !== '/') {
            $this->destPath .= '/';
        }

        $this->client = new Client(['base_uri' => $url]);
    }

    abstract public function zipName(): string;

    public function unzip(): void
    {
        $zipFile = new ZipFile($this->zipPath());

        $zipFile->unzip();
    }

    public function zipPath(): string
    {
        return $this->destPath . $this->zipName();
    }

    public function fetchZip(): void
    {
        $this->client->get($this->zipName(), ['sink' => $this->zipPath()]);
    }

    protected function readFromJsonFile(string $filePath): Generator
    {
        $jsonFileParser = new LargeJsonFileIterator($filePath);

        foreach ($jsonFileParser->iterate() as $item) {
            $data = $item->decode();

            yield new DosarIccj(
                $data->numar,
                $data->numarVechi,
                $data->data,
                $data->dataInitiala,
                $data->departament,
                $data->categorieCaz,
                $data->stadiuProcesual,
                $data->stadiulProcesualCombinat,
                $data->obiect,
                $data->obiecteSecundare,
                array_map(fn ($termen) => new TermenDosarIccj(
                    $termen->data,
                    $termen->ora,
                    $termen->complet,
                    $termen->numarDocument,
                    $termen->dataDocument,
                    $termen->tipDocument,
                    $termen->solutie,
                    $termen->detaliiSolutie,
                ), is_array($data->termene) ? $data->termene : []),
                array_map(fn ($parte) => new ParteDosarIccj(
                    $parte->nume,
                    $parte->calitateaProcesualaCurenta,
                    $parte->calitateaProcesualaAnterioara,
                    $parte->data
                ), $data->parti),
                array_map(fn ($caleAtac) => new CaleAtacDosarIccj(
                    $caleAtac->data,
                    $caleAtac->tip,
                    $caleAtac->numeParteDeclaranta,
                ), $data->caiAtac)
            );
        }
    }
}
