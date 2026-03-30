<?php

namespace App\Services\Cliente;

use App\Repositories\ProdutoRepository;

class ProdutoService
{
    public function __construct(
        private ProdutoRepository $repository
    ) {}

}
