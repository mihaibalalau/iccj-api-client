<?php

namespace Mihaib\IccjApiClient\Entities;

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
