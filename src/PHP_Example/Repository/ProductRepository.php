<?php

namespace PHP_Example\Repository;

use mysqli;
use mysqli_result;
use PHP_Example\Model\Product;

/**
 * A repository for retrieving products
 */
class ProductRepository
{

    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    /**
     * Get all products.
     * @return array
     */
    public function get_products(): array
    {
        $sql = 'SELECT * FROM Products';

        $result = $this->conn->query($sql);

        return $this->map_to_products($result);
    }

    /**
     * Helper function to map the results from a query to an array of Product objects.
     * @param mysqli_result $result
     * @return array
     */
    private function map_to_products(mysqli_result $result): array
    {
        $products = [];

        while ($row = $result->fetch_assoc()) {
            $products[] = $this->map_to_product($row);
        }

        return $products;
    }

    /**
     * Helper function to map a single row to a Product object
     * @param array $row
     * @return Product
     */
    private function map_to_product(array $row): Product
    {
        return new Product($row['ID'], $row['Name'], $row['Price']);
    }

    /**
     * Find all products with the given IDs
     * @param int ...$ids
     * @return array All the found products
     */
    public function find_by_ids(int ...$ids): array
    {
        $params = str_repeat('?,', count($ids) - 1) . '?';
        $query = "SELECT * FROM Products WHERE ID IN ($params)";

        $result = $this->conn->execute_query($query, $ids);

        return $this->map_to_products($result);
    }

}
