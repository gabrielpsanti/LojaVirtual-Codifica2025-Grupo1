<?php

namespace App\Enums;

enum GeneroProduto: int
{
    case MASCULINO = 1;
    case FEMININO = 2;
    case UNISSEX = 3;

    public function label(): string
    {
        return match ($this) {
            self::MASCULINO => 'Masculino',
            self::FEMININO => 'Feminino',
            self::UNISSEX => 'Unissex',
        };
    }
}
