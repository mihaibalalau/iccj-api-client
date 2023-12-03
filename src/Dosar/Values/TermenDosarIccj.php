<?php

namespace Mihaib\IccjApiClient\Dosar\Values;

class TermenDosarIccj
{
    public function __construct(
        public string $data,
        public string $ora,
        public string $complet,
        public string $numarDocument,
        public ?string $dataDocument,
        public ?string $tipDocument,
        public string $solutie,
        public string $detaliiSolutie,
    ) {
    }
}
