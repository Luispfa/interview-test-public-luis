<?php

namespace Test\Acceptance;

use PHPUnit\Framework\TestCase;
use UseCase\Entity\Product;

class ProductTest extends TestCase
{
    /**
     * @test
     * @dataProvider products
     */
    public function testGetRefence($reference, $expectedInfo)
    {
        $product = new Product($reference);
        $this->assertSame($expectedInfo[1], $product->getReference());
    }
    
    /**
     * @test
     * @dataProvider products
     */
    public function testGetName($reference, $expectedInfo)
    {
        $product = new Product($reference);
        $this->assertSame($expectedInfo[0], $product->getName());
    }

    public function products()
    {
        yield ['901001', ['Pasta de dientes',   '901001', 1.50, 'Promofarma', 0.5]];
        yield ['901002', ['Jarabe para la tos', '901002', 2.52, 'Openfarma',  0.3]];
        yield ['901003', ['Pack pañales',       '901003', 9.75, 'Openfarma',  0.4]];
        yield ['901004', ['Crema solar',        '901004', 6.08, 'Openfarma',  0.2]];
    }

}