<?php

namespace App\Helper\Validation;

class Enumeration 
{
    private $possibles;

    public function __construct (array $possibles) {
        $this->possibles = $possibles;
    }

    public function __invoke ($v) {
        if (empty($v)) $v = $this->possibles[0];

        foreach ($this->possibles as $possibility) {
            if ($v === $possibility) return true;
        }

        return false;
    }
}