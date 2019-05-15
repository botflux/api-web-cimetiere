<?php

namespace App\Form;

use App\Helper\Validation as Validation;

class CityForm extends Form 
{
    public function __construct () {
        $this
            ->add ([
                'name' => 'name',
                'validations' => []
            ])
            ->add ([
                'name' => 'county',
                'validations' => [
                    new Validation\Number ([
                        'from' => 0,
                        'to' => 1000
                    ]),
                ]
            ])
            ->add ([
                'name' => 'order-by',
                'validations' => [
                    new Validation\Enumeration ([ 'nom', 'departement' ]),
                ]
            ])
            ->add ([
                'name' => 'order-direction',
                'validations' => [
                    new Validation\Enumeration ([ 'ASC', 'DESC' ])
                ]
            ])
        ;
    }
}