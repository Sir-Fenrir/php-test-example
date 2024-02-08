<?php

namespace PHP_Example\Repository;

use mysqli;
use mysqli_result;
use PHP_Example\Model\Product;

class ProductRepository
{

    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function get_products(): array
    {
        $sql = 'SELECT * FROM Products';

        $result = $this->conn->query($sql);

        return $this->map_to_products($result);
    }

    private function map_to_products(mysqli_result $result): array
    {
        $products = [];

        while ($row = $result->fetch_assoc()) {
            $products[] = $this->map_to_product($row);
        }

        return $products;
    }

    private function map_to_product(array $row): Product
    {
        return new Product($row['ID'], $row['Name'], $row['Price']);
    }

    public function find_by_ids(int ...$ids): array
    {
        $params = str_repeat('?,', count($ids) - 1) . '?';
        $query = "SELECT * FROM Products WHERE ID IN ($params)";

        $result = $this->conn->execute_query($query, $ids);

        return $this->map_to_products($result);
    }

}
