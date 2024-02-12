<?php

namespace PHP_Example\Util;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../src/PHP_Example/Util/UserInputUtils.php';

class UserInputUtilsTest extends TestCase
{
    // Twee keer dezelfde parameter

    public function testQueryValueIsFound(): void
    {
        // Given
        $input = [
            'test' => '1,2'
        ];

        // When
        $result = query_value($input, 'test');

        // Then
        $this->assertEquals([1, 2], $result);
    }

    public function testQueryValueDouble(): void {
        // Given
        $input = [
            'coupons' => '1,1'
        ];

        // When
        $result = query_value($input, 'test');

        // Then
        $this->assertEquals([], $result);
    }

    public function testQueryValueNoList(): void {
        // Given
        $input = [
            'coupons' => '1.1'
        ];

        // When
        $result = query_value($input, 'coupons');

        // Then
        $this->assertEquals(['1.1'], $result);
    }

}
