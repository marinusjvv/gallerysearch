<?php
namespace MarinusJvv\GallerySearch;

use MarinusJvv\GallerySearch\Exceptions\InvalidSearchStringException;

class Validator 
{
    public static function validateSearchString($string)
    {
        if (self::isStringEmpty($string) === true) {
            throw new InvalidSearchStringException();
        }
    }
    
    public static function isStringEmpty($string)
    {
        return empty($string);
    }
}

