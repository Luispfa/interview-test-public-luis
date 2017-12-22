<?php

namespace Test\Acceptance;

use PHPUnit\Framework\TestCase;
use UseCase\Entity\Shop;

class ShopTest extends TestCase {

    /**
     * @test
     * @dataProvider shops
     */
    public function testGetShopname($shops, $expectedInfo) {
        $shop = new Shop($shops);
        $this->assertSame($expectedInfo[0], $shop->getShopname());
        $this->assertSame($expectedInfo[1], $shop->getBestPrice());
        $this->assertSame($expectedInfo[2], $shop->getSaving());
    }

    public function shops() {
        yield [
            array('Promofarma' => 1.50, 'Farmacia Martorell' => 2.5, 'Missfarma' => 2.15, 'Farmacia Orjales' => 3.00),
            array('Promofarma', 1.5, round((3.00 - 1.50) / 3.00, 1))
        ];
    }

}
