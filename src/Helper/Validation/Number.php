<?php

namespace App\Helper\Validation;

class Number {

    private $interval = [];

    public function __construct ($interval = []) {
        $this->interval = $interval;

        if (isset($interval['from']) && isset($interval['to'])) {
            if ($interval['from'] >= $interval['to']) {
                throw new \Exception ("The _from_ parameter can't be greater or equal to _to_");
            }
        }
    }

    public function __invoke ($v) {
        $value = $v ?? 0;

        /**
         * If this is a string
         */
        if (\is_string($value)) {

            /** If the string is not a number */
            if (!\is_numeric($value)) {
                return false;
            }

            /** If this is a float */
            if (\intval($value) != floatval($value)) {
                return false;
            }

            /** We parse only integer if $v is a string */
            $value = intval($value);
        }

        /** If $v is a float */
        if (!is_int($value)) return false;

        /** If an interval was specified */
        if (count($this->interval) > 0) {
            return $v >= $this->interval['from'] && $v <= $this->interval['to'];
        }

        return true;
        // $v = $v ?? 0;
        // \var_dump ($v);

        // if (\is_string($v)) {
        //     if (!\is_numeric ($v)) return false;

        //     if (\intval($v) != \floatval($v)) return false;
        // }

        // // if (\is_numeric ($v)) {
        // //     $v = intval ($v);

        // //     if ($v != \floatval($v))
        // //         return false;
        // // }

        // if (!is_int($v)) {
        //     return false;
        // }

        // if (count($this->interval) > 0) {

        //     return $v >= $this->interval['from'] && $v <= $this->interval['to'];
        // }

        // return true;
    }
}