<?php

namespace UseCase\GetProductInfo;

use UseCase\Entity\Product;
use UseCase\GetProductInfo\ProductInfo;

class GetProductInfoServiceBrokenImpl implements GetProductInfoService {

    public function get(string $reference) : ProductInfo
    {
        $product = new Product($reference);
        $name = $reference = $shopName = "";
        $bestPrice = $saving = 0;
        if (!is_null($product->getReference())) {
            $name = $product->getName();
            $reference = $product->getReference();
            $bestPrice = $product->getBestPrice();
            $shopName = $product->getShopname();
            $saving = $product->getSaving();
        }
        return new ProductInfo($name, $reference, $bestPrice, $shopName, $saving);
    }

}
