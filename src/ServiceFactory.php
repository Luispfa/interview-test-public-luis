<?php

use Controller\ProductController;
use UseCase\GetProductInfo\GetProductInfoService;
use UseCase\GetProductInfo\GetProductInfoServiceBrokenImpl;

final class ServiceFactory
{
    public static function build(string $identifier)
    {
        switch($identifier) {
            case ProductController::class:
                return self::buildProductController();
            case GetProductInfoService::class:
                return self::buildGetProductInfoService();
            default:
                throw new \Exception('Class '.$identifier.' not found');
        }
    }

    private static function buildProductController(): ProductController
    {
        return new ProductController();
    }

    private static function buildGetProductInfoService(): GetProductInfoService
    {
        return new GetProductInfoServiceBrokenImpl();
    }
}
