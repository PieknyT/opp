<?php

require_once(dirname(__FILE__) . "/conf.php");

try
{
    $conf = new Conf(dirname(__FILE__)."/config1.xml");
    print "user: ".$conf->get('user')."\n";
    print "host: ".$conf->get('host')."\n";
    $conf->set("pass", "bigmanymany");
    print "pass: ".$conf->get('pass')."\n";
    $conf->write();
}
catch(FileException $e)
{
    //problem with access file
    print_r($e->getMessage()."<br>");
    print_r($e->getCode()."<br>");
    print_r($e->getFile()."<br>");
    print_r($e->getLine()."<br>");
    echo '<pre>';
    print_r($e->getTrace());
    echo '</pre>';
    print_r("<br>");
    print_r($e->getTraceAsString()."<br>");
    print_r("<br>");

    die($e->__toString());
}
catch(XmlException $e)
{
    //broken xml file
    print_r($e->getMessage()."<br>");

}
catch (ConfException $e)
{
    //wrong type of xml //tags are not conf type
    print_r($e->getMessage()."<br>");
}
catch(Exeption $e)
{
    //It should not come to this call
    print_r($e->getMessage()."<br>");
}