<?php

namespace App\Services\Admin;

use App\Repositories\ProdutoRepository;

class ProdutoService
{
    public function __construct(
        private ProdutoRepository $repository
    ) {}

}
