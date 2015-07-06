<?php 
namespace MarinusJvv\GallerySearch\Exceptions;
class InvalidSearchStringException extends \Exception 
{
    public function __construct() {
        parent::__construct('Invalid search string. Please enter a valid search string');
    }
}
