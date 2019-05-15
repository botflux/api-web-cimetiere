<?php

namespace App\Helper\Validation;

class EmptyValue {
    public function __invoke ($v) {
        return !empty ($v);
    }
}