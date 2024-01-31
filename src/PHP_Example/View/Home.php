<?php
declare(strict_types=1);

namespace PHP_Example\View;

use PHP_Example\Repository\ProductRepository;

class Home extends View
{

    private ProductRepository $repository;

    public array $products;
    public function __construct($repository)
    {
        parent::__construct("home.phtml");
        $this->repository = $repository;
    }

    public function process($input): View
    {
//        parse_str($input['query'], $queryArray);
//        $this->list = $queryArray;
        $this->products = $this->repository->get_products();
        return $this;
    }
}
