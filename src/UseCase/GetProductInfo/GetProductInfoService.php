<?php

namespace UseCase\GetProductInfo;

interface GetProductInfoService
{
    public function get(string $reference): ProductInfo;
}