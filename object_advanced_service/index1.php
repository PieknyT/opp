<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<?php
// Zawansowana obsługa obiektów   (metody i składowwe statyczne)

class StaticExample
{
    static public $aNum = 3;
    static public function sayHello()
    {
        self::$aNum = self::$aNum + self::$aNum +2;
        print "Hej Januszku, (".self::$aNum. ")";
    }
}


print StaticExample::$aNum;
StaticExample::sayHello();
