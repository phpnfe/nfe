<?php namespace PhpNFe\NFe\Tools;

class AjustaXML
{
    public static function limpaXml($xml)
    {
        return preg_replace("/<\?xml.*\?>/", '', $xml);
    }
}