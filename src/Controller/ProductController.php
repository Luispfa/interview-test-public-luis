<?php

namespace Controller;

use UseCase\GetProductInfo\GetProductInfoService;
use UseCase\GetProductInfo\ProductInfo;
use ServiceFactory;

final class ProductController {

    public function getInfoAction(string $reference) {
        $output = array();
        
        $object = ServiceFactory::build(GetProductInfoService::class);
        $productInfo = $object->get($reference);
        if ($productInfo instanceof ProductInfo) {
            $output = array(
                'reference' => $productInfo->reference(),
                'name' => $productInfo->name(),
                'bestPrice' => $productInfo->bestPrice(),
                'bestPriceShopName' => $productInfo->bestPriceShopName(),
                'saving' => $productInfo->savings());
        }

        echo json_encode($output);
    }

}
