<?php

namespace Test\Acceptance;

use PHPUnit\Framework\TestCase;
use Exception\NotFoundException;
use ServiceFactory;
use UseCase\GetProductInfo\GetProductInfoService;

class GetProductInfoServiceTest extends TestCase
{
    /**
     * @test
     * @dataProvider products
     */
    public function itShouldReturnCorrectProductInformation($reference, $expectedInfo)
    {
        $getProductService = ServiceFactory::build(GetProductInfoService::class);

        $result = $getProductService->get($reference);

        $this->assertSame($expectedInfo[0], $result->name());
        $this->assertSame($expectedInfo[1], $result->reference());
        $this->assertSame($expectedInfo[2], $result->bestPrice());
        $this->assertSame($expectedInfo[3], $result->bestPriceShopName());
        $this->assertSame($expectedInfo[4], $result->savings());
    }

    public function products()
    {
        yield ['901001', ['Pasta de dientes',   '901001', 1.50, 'Promofarma', 0.5]];
        yield ['901002', ['Jarabe para la tos', '901002', 2.52, 'Openfarma',  0.3]];
        yield ['901003', ['Pack pañales',       '901003', 9.75, 'Openfarma',  0.4]];
        yield ['901004', ['Crema solar',        '901004', 6.08, 'Openfarma',  0.2]];
    }

    /**
     * @test
     */
    public function itShouldThrowExceptionWhenReferenceDoesNotExist()
    {
        $this->expectException(NotFoundException::class);

        $getProductService = ServiceFactory::build(GetProductInfoService::class);

        $getProductService->get('DoesNotExist');
    }
}