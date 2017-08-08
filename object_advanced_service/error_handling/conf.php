<?php

class Conf
{
    public $file;
    private $xml;
    private $lastmatch;

    function __construct($file)
    {
        $this->file = $file;
        $this->xml = simplexml_load_file($file);
    }

    function write()
    {
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

$path = "./config.xml";

$newTest = new Conf($path);


print_r($newTest->file);


print_r($newTest);

print_r($newTest->get("user"));

$newTest->set("localization", "Krosno");
$newTest->set("login", "karamba");


print_r($newTest->get("localization"));
$newTest->write();
//print_r($newTest);