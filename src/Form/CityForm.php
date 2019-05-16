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
                    [ 
                        'validate' => new Validation\Number ([
                            'from' => 0,
                            'to' => 1000
                        ]),
                        'message' => '%s must be a number between 0 and 1000' 
                    ]
                ]
            ])
            ->add ([
                'name' => 'order-by',
                'validations' => [
                    [
                        'validate' => new Validation\Enumeration ([ 'nom', 'departement' ]),
                        'message' => '%s can only use values "nom" and "departement"'
                    ]
                ]
            ])
            ->add ([
                'name' => 'order-direction',
                'validations' => [
                    [
                        'validate' => new Validation\Enumeration ([ 'ASC', 'DESC' ]),
                        'message' => '%s can only use values "ASC" and "DESC"'
                    ]
                ]
            ])
        ;
    }
}