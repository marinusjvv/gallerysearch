<?php
namespace MarinusJvv\GallerySearch\Api;

class Caller 
{
    private $url;
    private $parameters;
    
    public function __construct($url, array $parameters)
    {
        $this->url = $url;
        $this->parameters = $parameters;
    }
    
    public function call()
    {
        return file_get_contents($this->buildUrlString());
    }
    
    private function buildUrlString()
    {
        $param_str = '?';
        foreach ($this->parameters as $key => $value) {
            $param_str .= urlencode($key) . '=' . urlencode($value) . '&';
        }
        return $this->url . rtrim($param_str, '&');
    }
}
