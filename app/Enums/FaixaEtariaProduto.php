<?php

namespace App\Enums;

enum FaixaEtariaProduto: int
{
    case INFANTIL = 1;
    case JUVENIL = 2;
    case ADULTO = 3;

    public function label(): string
    {
        return match ($this) {
            self::INFANTIL => 'Infantil',
            self::JUVENIL => 'Juvenil',
            self::ADULTO => 'Adulto',
        };
    }
}
