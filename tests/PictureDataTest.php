<?php
namespace MarinusJvv\Tests;

use MarinusJvv\Tests\Base\TestHelper;
use MarinusJvv\GallerySearch\Response\PictureData;

class PictureDataTest extends \PHPUnit_Framework_TestCase
{
    public function testGetPictureDataAttributes_GivenValidData_ReturnsExpectedData()
    {
        $xml = simplexml_load_string(TestHelper::getValidXMLResponseExample());
        $pictureData = new PictureData($xml->photos->photo[1]);
        $this->assertEquals(
            array(
           		'url' => 'https://farm2.staticflickr.com/2/2_b.jpg',
            	'title' => 'b',
            ),
            $pictureData->getData()
        );
    }
}
