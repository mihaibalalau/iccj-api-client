<?php

namespace Mihaib\IccjApiClient\Entities;

class CaleAtacDosarIccj
{
    public function __construct(
        public string $data,
        public string $tip,
        public string $numeParteDeclaranta,
    ) {
    }
}
