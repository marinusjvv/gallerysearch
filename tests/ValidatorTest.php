<?php
use MarinusJvv\GallerySearch\Validator;

class ValidatorTest extends PHPUnit_Framework_TestCase
{
    public function testValidateSearchString_GivenEmptyString_ThrowsException()
    {
        $this->setExpectedException('MarinusJvv\GallerySearch\Exceptions\InvalidSearchStringException');
        Validator::validateSearchString('');
    }
}

