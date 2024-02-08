<?php
declare(strict_types=1);

namespace PHP_Example\View;

use PHP_Example\Model\Bill;
use PHP_Example\Service\ProductService;

class Home extends View
{

    public Bill $bill;
    private ProductService $service;

    public function __construct(ProductService $service)
    {
        parent::__construct("home.phtml");
        $this->service = $service;
    }

    public function process(array $input): View
    {
        parse_str($input['query'], $queryArray);
        $productIds = explode(',', $queryArray['products']);
        $couponIds = explode(',', $queryArray['coupons']);

        $this->bill = $this->service->get_bill($productIds, $couponIds);
        return $this;
    }
}
