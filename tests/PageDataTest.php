<?php
namespace MarinusJvv\Tests;

use MarinusJvv\Tests\Base\TestHelper;
use MarinusJvv\GallerySearch\Response\PageData;

class PageDataTest extends \PHPUnit_Framework_TestCase
{
    public function testGetPageDataAttributes_GivenValidData_ReturnsExpectedData()
    {
        $xml = simplexml_load_string(TestHelper::getValidXMLResponseExample());
        $pageData = new PageData($xml);
        $this->assertEquals(
            array(
                'page' => 3,
                'pages' => 5,
                'total' => 25,
            ), 
            $pageData->getOutputData()
        );
    }
}
