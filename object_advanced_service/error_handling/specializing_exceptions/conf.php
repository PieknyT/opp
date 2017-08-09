<?php

require_once(dirname(__FILE__) . "/exceptionSpecial.php");

class Conf
{
    public $file;
    private $xml;
    private $lastmatch;

    function __construct($file)
    {
        $this->file = $file;
        if(!file_exists($file))
        {
            throw new FileException("File '$file' not exist");
        }

        $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR);
        if(! is_object($this->xml))
        {
            throw new XmlException(libxml_get_last_error());
        }

        print gettype($this->xml);
        print "<br>";
        $matches = $this->xml->xpath("/conf");
        if (! count($matches))
        {
            throw new ConfException("cant find element: conf");
        }

    }

    function write()
    {
        if(! is_writeable($this->file))
        {
            throw new FileException("File '$this->file' can not write");

        }
        file_put_contents($this->file, $this->xml->asXML());
    }

    function get($str)
    {
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if(count($matches))
        {
            $this->lastmatch = $matches[0];
            return (string) $matches[0];
        }
        return null;
    }

    function set($key, $value)
    {
        if(! is_null($this->get($key)))
        {
            $this->lastmatch[0] = $value;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }


}

