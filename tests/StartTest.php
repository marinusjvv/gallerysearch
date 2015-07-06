<?php
use MarinusJvv\GallerySearch\Start;

class StartTest extends PHPUnit_Framework_TestCase
{
    public function testIsWorking()
    {
        $this->assertTrue(Start::isWorking());
    }
}

