<?php
namespace MarinusJvv\GallerySearch\Response;

use MarinusJvv\GallerySearch\Response;
use MarinusJvv\GallerySearch\Exceptions\InvalidResponseXMLException;

class XmlParser 
{
    private $pageData;
    private $picturesData = array();
    
    public function __construct($response_string)
    {
        $parsed = $this->parseRawStringToXML($response_string);
        $this->processResponse($parsed);
    }
    
    public function getPageData()
    {
        return $this->pageData;
    }
    
    public function getPicturesData()
    {
        return $this->picturesData;
    }
    
    private function parseRawStringToXML($string)
    {
        return @simplexml_load_string($string);
    }
    
    private function processResponse($parsedXML)
    {
        if ($this->isInvalidResponseXML($parsedXML) === true) {
            throw new InvalidResponseXMLException();
        }
        $this->pageData = new PageData($parsedXML);
        foreach ($parsedXML->photos->photo as $photo) {
            $this->picturesData[] = (string)new PictureData($photo);
        }
    }
    
    private function isInvalidResponseXML($parsedXML)
    {
        return $parsedXML === false
            || empty($parsedXML['stat']) === true
            || (string)$parsedXML['stat'] !== 'ok';
    }
}
