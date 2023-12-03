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

    public static function termen(
        string $data,
        string $ora,
        string $complet,
        string $numarDocument,
        ?string $dataDocument,
        ?string $tipDocument,
        string $solutie,
        string $detaliiSolutie,
    ): TermenDosarIccj {
        return new TermenDosarIccj(
            $data,
            $ora,
            $complet,
            $numarDocument,
            $dataDocument,
            $tipDocument,
            $solutie,
            $detaliiSolutie,
        );
    }

    public static function parte(
        string $nume,
        string $calitateaProcesualaCurenta,
        ?string $calitateaProcesualaAnterioara = null,
        ?string $data = null,
    ): ParteDosarIccj {
        return new ParteDosarIccj(
            $nume,
            $calitateaProcesualaCurenta,
            $calitateaProcesualaAnterioara,
            $data,
        );
    }

    public static function caleAtac(
        string $data,
        string $tip,
        string $numeParteDeclaranta,
    ): CaleAtacDosarIccj {
        return new CaleAtacDosarIccj(
            $data,
            $tip,
            $numeParteDeclaranta,
        );
    }
}
