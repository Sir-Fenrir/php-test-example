<?php

namespace PHP_Example\Service;

use PHP_Example\Model\Product;
use PHP_Example\Repository\CouponRepository;
use PHP_Example\Repository\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{

    public function test(): void
    {
        // Given
        $mockProductRepository = $this->createConfiguredMock(
            ProductRepository::class,
            [
                'find_by_ids' => [new Product(1, "Baldur's Gate 3", 60)]
            ]
        );

        $mockCouponRepository = $this->createConfiguredMock(
            CouponRepository::class,
            [
                'find_by_ids' => [25]
            ]
        );

        $productService = new ProductService($mockProductRepository, $mockCouponRepository);

        // When
        $bill = $productService->get_bill([1], [1]);


        // Then

        $this->assertEquals(45, $bill->getTotalPrice());

    }

}