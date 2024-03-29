<?php

namespace PHP_Example\Repository;

use mysqli;

/**
 * Repository for the Coupons
 */
class CouponRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    /**
     * Find all coupons with the given IDs
     * @param int ...$ids
     * @return array All the found discount percentages
     */
    public function find_by_ids(int ...$ids): array
    {
        $params = str_repeat('?,', count($ids) - 1) . '?';
        $query = "SELECT * FROM Coupons WHERE ID IN ($params)";

        $result = $this->conn->execute_query($query, $ids);

        $discounts = [];

        while ($row = $result->fetch_assoc()) {
            $discounts[] = $row['Percentage'];
        }

        return $discounts;
    }
}