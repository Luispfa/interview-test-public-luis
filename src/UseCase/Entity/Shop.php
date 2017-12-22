<?php

namespace UseCase\Entity;

use UseCase\Entity\Price;

class Shop extends Price {

    private $shopname;

    public function __construct(array $shops) {
        $max_price = max($shops);
        $min_price = min($shops);

        $this->shopname = array_keys($shops, $min_price)[0];
        parent::__construct($max_price, $min_price);
    }

    public function getShopname() {
        return $this->shopname;
    }

}
