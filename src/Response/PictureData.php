<?php
namespace MarinusJvv\GallerySearch\Response;

class PictureData
{
    private $farm;
    private $server;
    private $id;
    private $secret;
    private $title;
    
    public function __construct(\SimpleXMLElement $xml)
    {
        $this->id = (string)$xml['id'];
        $this->secret = (string)$xml['secret'];
        $this->farm = (string)$xml['farm'];
        $this->server = (string)$xml['server'];
        $this->title = (string)$xml['title'];
    }
    
    public function getData()
    {
        return array(
        	'url' => 'https://farm' . $this->farm . '.staticflickr.com/' . $this->server . '/' . $this->id . '_' . $this->secret . '.jpg',
        	'title' => $this->title,
        );
    }
}
