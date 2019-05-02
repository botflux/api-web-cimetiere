<?php

namespace App\Helper;

class StringHelper 
{
    /**
     * Returns the passed surrounded by percent.
     * If the given string is empty then a string with just a percent will be returned.
     *
     * @param string $stringToSurround
     * @return string
     */
    public static function surroundByPercents ($stringToSurround)
    {
        if (empty($stringToSurround)) {
            return '%';
        }

        return "%$stringToSurround%";
    }
}