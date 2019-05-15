<?php

namespace App\Form;

use Psr\Http\Message\ServerRequestInterface as Request;

class Form 
{
    private $fields = [];

    public function __construct () {}

    /**
     * Add a new validation to the Form
     *
     * @param array $field
     * @return self
     */
    protected function add (array $field) : self {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Returns true if the current request params matchs the given validation
     *
     * @param Request $request
     * @return boolean
     */
    public function isValid (Request $request) {
        foreach ($this->fields as $field) {
            $name = $field['name'];

            $value = $request->getParam ($name);

            foreach ($field['validations'] as $v) {
                $validationResult = $v ($value);

                if (!$validationResult) return false;
            }
        }

        return true;
    }
}