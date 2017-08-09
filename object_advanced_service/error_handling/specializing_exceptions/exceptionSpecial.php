<?php

class XmlException extends Exception
{
    private $error;

    function __construct(LibXMLError $error)
    {
        $shortfile = basename($error->file);
        $msg = "[{$shortfile}, wiersz {$error->line}, "."kolumna {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);
    }

    function getLibXmlError()
    {
        return $this->error;
    }
}

class FileException extends Exception {}

class ConfException extends Exception {}