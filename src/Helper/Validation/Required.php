<?php

namespace App\Helper\Validation;

class Required {
    public function __invoke ($v) {
        return isset ($v);
    }
}