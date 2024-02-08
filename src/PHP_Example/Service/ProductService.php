<?php

namespace PHP_Example\Service;

use PHP_Example\Model\Bill;
use PHP_Example\Model\Product;
use PHP_Example\Repository\CouponRepository;
use PHP_Example\Repository\ProductRepository;
use phpstream\impl\MemoryStream;

/**
 * Our class to bundle the business logica related to Products
 */
class ProductService
{
    private ProductRepository $productRepository;

    private CouponRepository $couponRepository;

    /**
     * We want to pass the dependencies via the constructor
     * @param ProductRepository $productRepository
     * @param CouponRepository $couponRepository1
     */
    public function __construct(ProductRepository $productRepository, CouponRepository $couponRepository1)
    {
        $this->productRepository = $productRepository;
        $this->couponRepository = $couponRepository1;
    }

    /**
     * Generate a bill, with the given product IDs and the given coupon IDs,
     * after which a final total is calculated.
     * @param array $productIds
     * @param array $couponIds
     * @return Bill
     */
    public function get_bill(array $productIds, array $couponIds): Bill
    {
        $products = empty($productIds) ? [] : $this->productRepository->find_by_ids(...$productIds);
        $coupons = empty($couponIds) ? [] : $this->couponRepository->find_by_ids(...$couponIds);

        $totalPrice = (new MemoryStream($products))
            ->map(function (Product $product) {
                return $product->getPrice();
            })
            ->reduce(function ($a, $b) {
                return $a + $b;
            });


        $discount = (new MemoryStream($coupons))
            ->map(function (int $coupon) {
                return (100 - $coupon) / 100;
            })
            ->reduce(function ($a, $b) {
                return empty($a) ? $b : $a * $b;
            });

        return new Bill($products, $coupons, $totalPrice * $discount);

    }

}