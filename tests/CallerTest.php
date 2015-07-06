<?php
namespace MarinusJvv\Tests;

use MarinusJvv\GallerySearch\Api\Caller;

class CallerTest extends \PHPUnit_Framework_TestCase
{
    public function testCall()
    {
        $caller = new Caller(
            'https://api.flickr.com/services/rest/',
            $this->getParameters()
        );
        $this->assertEquals(
            $this->getExpectedResponse(),
            str_replace("\n", '', $caller->call())
        );
    }
    
    private function getParameters()
    {
        return array(
            'method' => 'flickr.test.echo',
            'api_key' => '4cd9ff50ccac0a16193669c1799b42f1',
        );
    }
    
    private function getExpectedResponse()
    {
        return '<?xml version="1.0" encoding="utf-8" ?><rsp stat="ok"><method>flickr.test.echo</method><api_key>4cd9ff50ccac0a16193669c1799b42f1</api_key></rsp>';
    }
}

