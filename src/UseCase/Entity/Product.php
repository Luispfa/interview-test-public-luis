<?php

namespace UseCase\Entity;

use UseCase\Entity\Shop;

class Product extends Shop {

    private $reference = null;
    private $name = null;

    public function __construct($reference) {
        $products = $this->getAllProduct();
        if (array_key_exists($reference, $products)) {
            $this->reference = $reference;
            $this->name = $products[$this->reference]['name'];

            $shops = $products[$this->reference]['shops'];
            parent::__construct($shops);
        }else{
            
        }
    }

    private function getAllProduct() {
        $path = __DIR__ . '/../../data/data.json';
        $content = file_get_contents($path);
        return json_decode($content, true);
    }

    public function getReference() {
        return $this->reference;
    }

    public function getName() {
        return $this->name;
    }

}
