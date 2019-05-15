<?php

namespace App\Form;

use App\Helper\Validation as Validation;

class PaginationForm extends Form
{
    public function __construct () {
        $this->add ([
            'name' => 'page',
            'validations' => [
                new Validation\Number ([
                    'from' => 0,
                    'to' => 1000
                ])
            ]
        ]);
    }
}