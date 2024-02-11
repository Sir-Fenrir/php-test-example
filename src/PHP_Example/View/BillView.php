<?php
declare(strict_types=1);

namespace PHP_Example\View;

require_once __DIR__ . '/../Util/UserInputUtils.php';

use PHP_Example\Model\Bill;
use PHP_Example\Service\ProductService;

/**
 * Our view class to populate the template (home.phtml)
 */
class BillView extends View
{

    public Bill $bill;

    // The product service
    private ProductService $service;

    public function __construct(ProductService $service)
    {
        parent::__construct("home.phtml");
        $this->service = $service;
    }

    public function process(array $input): View
    {
        $params = query_parameters($input, 'products', 'coupons');
        $this->bill = $this->service->get_bill($params['products'], $params['coupons']);
        return $this;
    }
}
