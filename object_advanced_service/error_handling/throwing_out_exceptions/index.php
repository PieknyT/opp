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
catch(Exception $e)
{
    print_r($e->getMessage()."<br>");
    print_r($e->getCode()."<br>");
    print_r($e->getFile()."<br>");
    print_r($e->getLine()."<br>");


  //  print_r($e->getPrevious()); zagnieżdzony obiekt klasy Exception
    echo '<pre>';
    print_r($e->getTrace());
    echo '</pre>';

    print_r("<br>");
    print_r($e->getTraceAsString()."<br>");
    print_r("<br>");

    die($e->__toString());
}