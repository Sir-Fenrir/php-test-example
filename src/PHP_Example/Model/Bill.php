<?php

namespace PHP_Example\Model;

class Bill
{

    private array $products;

    private array $coupons;

    private float $totalPrice;

    /**
     * @param array $products
     * @param array $coupons
     * @param float $totalPrice
     */
    public function __construct(array $products, array $coupons, float $totalPrice)
    {
        $this->products = $products;
        $this->coupons = $coupons;
        $this->totalPrice = $totalPrice;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function getCoupons(): array
    {
        return $this->coupons;
    }

    public function setCoupons(array $coupons): void
    {
        $this->coupons = $coupons;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }


}
