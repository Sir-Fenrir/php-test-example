<?php

namespace PHP_Example\Model;

class Product
{
    private int $ID;

    private string $name;

    private float $price;

    /**
     * @param int $ID
     * @param string $name
     * @param float $price
     */
    public function __construct(int $ID, string $name, float $price)
    {
        $this->ID = $ID;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     * @return Product
     */
    public function setID(int $ID): Product
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }



}
