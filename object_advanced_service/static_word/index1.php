<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset = utf8-polish-ci"/>
</head>

<?php
// Późne wiązanie statyczne ( słowo static)

abstract class DomainObject
{

}

class User extends DomainObject
{
    public static function create()
    {
        return new User();
    }
}

class Document extends DomainObject
{
    public static function create()
    {
        return new Document();
    }
}





