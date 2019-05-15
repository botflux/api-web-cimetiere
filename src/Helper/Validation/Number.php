<?php

namespace App\Helper\Validation;

class Number {

    private $interval = [];

    public function __construct ($interval) {
        $this->interval = $interval;
    }

    public function __invoke ($v) {
        $v = $v ?? 0;

        if (\ctype_digit ($v)) {
            $v = intval ($v);
        }

        if (!is_int($v)) {
            return false;
        }

        if (count($this->interval) > 0) {

            return $v >= $this->interval['from'] && $v <= $this->interval['to'];
        }

        return true;
    }
}