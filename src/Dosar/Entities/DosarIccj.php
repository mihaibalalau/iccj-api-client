<?php

namespace Mihaib\IccjService\Dosar\Entities;

use Mihaib\IccjService\Dosar\Values\CaleAtacDosarIccj;
use Mihaib\IccjService\Dosar\Values\ParteDosarIccj;
use Mihaib\IccjService\Dosar\Values\TermenDosarIccj;

/**
 * @property TermenDosarIccj[] $termene
 * @property ParteDosarIccj[] $parti
 * @property CaleAtacDosarIccj[] $caiAtac
 */
class DosarIccj
{
    public function __construct(
        public string $numar,
        public ?string $numarVechi,
        public string $data,
        public ?string $dataInitiala,
        public string $departament,
        public string $categorieCaz,
        public string $stadiuProcesual,
        public ?string $stadiulProcesualCombinat,
        public string $obiect,
        public ?string $obiecteSecundare,
        public array $termene,
        public array $parti,
        public array $caiAtac,
    ) {
    }
}
