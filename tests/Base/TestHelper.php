<?php
namespace MarinusJvv\Tests\Base;

class TestHelper
{
    public static function getValidXMLResponseExample()
    {
        return <<<XML
<?xml version="1.0" encoding="utf-8" ?>
<rsp stat="ok">
  <photos page="3" pages="5" perpage="100" total="25">
    <photo id="1" owner="1@N05" secret="a" server="1" farm="1" title="a" ispublic="1" isfriend="0" isfamily="0" />
    <photo id="2" owner="2@N06" secret="b" server="2" farm="2" title="b" ispublic="1" isfriend="0" isfamily="0" />
    <photo id="3" owner="3@N00" secret="c" server="3" farm="3" title="c" ispublic="1" isfriend="0" isfamily="0" />
    <photo id="4" owner="4@N05" secret="d" server="4" farm="4" title="d" ispublic="1" isfriend="0" isfamily="0" />
  </photos>
</rsp>
XML;
    }
    
    public static function getInvalidXMLResponseExample()
    {
        return '<?xml version="1.0" encoding="utf-8" ?><incorrect stat="fail"></rsp>';
    }
    
    public static function getFailedXMLResponseExample()
    {
        return '<?xml version="1.0" encoding="utf-8" ?><rsp stat="fail"></rsp>';
    }
}
