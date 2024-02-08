<?php

namespace PHP_Example\Service;

use PHP_Example\Model\Bill;
use PHP_Example\Model\Product;
use PHP_Example\Repository\CouponRepository;
use PHP_Example\Repository\ProductRepository;
use phpstream\impl\MemoryStream;

class ProductService
{
    private ProductRepository $productRepository;

    private CouponRepository $couponRepository;

    public function __construct(ProductRepository $productRepository, CouponRepository $couponRepository1)
    {
        $this->productRepository = $productRepository;
        $this->couponRepository = $couponRepository1;
    }

    public function find_by_ids(int ...$ids): array
    {
        return $this->productRepository->find_by_ids(...$ids);
    }

    public function get_bill(array $productIds, array $couponIds): Bill
    {

        $products = $this->productRepository->find_by_ids(...$productIds);
        $coupons = $this->couponRepository->find_by_ids(...$couponIds);

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