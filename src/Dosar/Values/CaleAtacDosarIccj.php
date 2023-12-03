<?php

namespace Mihaib\IccjApiClient\Dosar\Values;

class CaleAtacDosarIccj
{
    public function __construct(
        public string $data,
        public string $tip,
        public string $numeParteDeclaranta,
    ) {
    }
}
