<?php
namespace MarinusJvv\GallerySearch\Response;

class PageData 
{
    private $page;
    private $pages;
    private $total;
    
    public function __construct(\SimpleXMLElement $xml)
    {
        $this->page = (string)$xml->photos['page'];
        $this->pages = (string)$xml->photos['pages'];
        $this->total = (string)$xml->photos['total'];
    }
    
    public function getOutputData() {
        return array(
            'page' => $this->page,
            'pages' => $this->pages,
            'total' => $this->total,
        );
    }
}
