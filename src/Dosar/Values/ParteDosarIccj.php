<?php

namespace Mihaib\IccjService\Dosar\Values;

class ParteDosarIccj
{
    public function __construct(
        public string $nume,
        public string $calitateaProcesualaCurenta,
        public ?string $calitateaProcesualaAnterioara = null,
        public ?string $data = null,
    ) {
    }
}
