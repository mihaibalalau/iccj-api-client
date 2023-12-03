<?php

namespace Mihaib\IccjService\Dosar;

use InvalidArgumentException;

class GetDosareIccjQuery
{
    public function __construct(
        public ?string $nr = null,
        public ?string $parte = null,
        public ?string $obiect = null,
        public ?string $dataStart = null,
        public ?string $dataEnd = null,
    ) {
    }

    public function isValid(): bool
    {
        return count($this->toArray()) !== 0;
    }

    public function validate(): void
    {
        if (!$this->isValid()) {
            throw new InvalidArgumentException("GetDosareIccjQuery should not be empty!");
        }
    }

    public function toArray(): array
    {
        return array_filter([
            'nr' => $this->nr,
            'parte' => $this->parte,
            'obiect' => $this->obiect,
            'dataStart' => $this->dataStart,
            'dataEnd' => $this->dataEnd,
        ], fn ($v) => !is_null($v));
    }
}
