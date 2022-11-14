<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\VO;

use App\Domain\Pokemon\Enum\PokemonTypeEnum;

final class PokemonType
{
    private function __construct(private readonly ?string $type)
    {
    }

    public static function fromEnum(PokemonTypeEnum $pokemonType): self
    {
        return new self($pokemonType->value);
    }

    public function asStringOrFail(): string
    {
        if (null === $this->type) {
            throw new \LogicException('Expected string value for type, got null.');
        }

        return $this->type;
    }

    public function asStringOrNull(): ?string
    {
        return $this->type;
    }
}
