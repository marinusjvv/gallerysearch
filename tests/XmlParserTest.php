<?php
namespace MarinusJvv\Tests;

use MarinusJvv\Tests\Base\TestHelper;
use MarinusJvv\GallerySearch\Response as Response;

class XmlParserTest extends \PHPUnit_Framework_TestCase
{
    public function testXmlParser_GivenInvalidResponse_ThrowsException()
    {
        $this->setExpectedException(
            'MarinusJvv\GallerySearch\Exceptions\InvalidResponseXMLException'
        );
        $response = new Response\XmlParser(
            TestHelper::getInvalidXMLResponseExample()
        );
    }
    
    public function testXmlParser_GivenFailResponse_ThrowsException()
    {
        $this->setExpectedException(
            'MarinusJvv\GallerySearch\Exceptions\InvalidResponseXMLException'
        );
        $response = new Response\XmlParser(
            TestHelper::getFailedXMLResponseExample()
        );
    }
    
    public function testXmlParser_GivenProperResponse_BuildsResponseObject()
    {
        $response = new Response\XmlParser(TestHelper::getValidXMLResponseExample());
        $this->assertInstanceOf(
            'MarinusJvv\GallerySearch\Response\PageData',
            $response->getPageData()
        );
        $pictures = $response->getPicturesData();
    }

    private function getExpectedPictureData()
    {
        return array(
            array(
                'id' => '1',
                'secret' => 'a',
            ),
            array(
                'id' => '2',
                'secret' => 'b',
            ),
            array(
                'id' => '3',
                'secret' => 'c',
            ),
            array(
                'id' => '4',
                'secret' => 'd',
            ),
        );
    }
}

