<?php

namespace Mihaib\IccjApiClient\Dosar\Entities;

class DosarIccjCollection
{
    /**
     * @param DosarIccj[] $items 
     */
    public function __construct(
        public array $items = []
    ) {
    }
}
