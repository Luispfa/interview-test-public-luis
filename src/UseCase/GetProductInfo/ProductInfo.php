<?php

namespace UseCase\GetProductInfo;

final class ProductInfo
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $reference;

    /** @var float */
    protected $bestPrice;

    /** @var string */
    protected $bestPriceShopName;

    /** @var float */
    protected $savings;

    public function __construct(
        string $name,
        string $reference,
        float $bestPrice,
        string $bestPriceShopName,
        float $savings
    ) {
        $this->name = $name;
        $this->reference = $reference;
        $this->bestPrice = $bestPrice;
        $this->bestPriceShopName = $bestPriceShopName;
        $this->savings = $savings;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function reference(): string
    {
        return $this->reference;
    }

    public function bestPrice(): float
    {
        return $this->bestPrice;
    }

    public function bestPriceShopName(): string
    {
        return $this->bestPriceShopName;
    }

    public function savings(): float
    {
        return $this->savings;
    }
}