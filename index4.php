<?php
// Typy argumentów metod
//      is_bool()
//      is_integer()
//      is_double()
//      is_string()
//      is_object()
//      is_array()
//      is_resource()
//      is_null()



class AddressManager
{
    private $adresses = array("209.131.36.159", "74.125.19.106", "192.168.101.1");

    function outputAdresses($resolve)
    {
        if (is_string($resolve))
        {
            $resolve = (preg_match("/false|no|off/i", $resolve)) ? false : true;
        }

        foreach($this->adresses as $address)
        {
            print $address;
            if($resolve)
            {
                print " (". gethostbyaddr($address) . ")";
            }
            print"\n";
        }
    }
}


$settings = simplexml_load_file("settings.xml");
$manager = new AddressManager();
$manager->outputAdresses( (string)$settings->resolvedomains);









