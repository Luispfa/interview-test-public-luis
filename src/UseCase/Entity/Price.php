<?php

namespace UseCase\Entity;

class Price {

    private $min;
    private $max;

    public function __construct($max, $min) {
        $this->min = $min;
        $this->max = $max;
    }

    public function getBestPrice() {
        return $this->min;
    }

    public function getSaving() {
        return round(($this->max - $this->min) / $this->max, 1);
    }

}
