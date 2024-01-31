<?php

namespace PHP_Example\Repository;

use mysqli;
use PHP_Example\Model\Product;

class ProductRepository
{

    private mysqli $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get_products(): array {
        $products = [];

        $sql = 'SELECT * FROM Products';

        $result = $this->conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $products[] = new Product($row['ID'], $row['Name'], $row['Price']);
        }

        return $products;
    }

}
