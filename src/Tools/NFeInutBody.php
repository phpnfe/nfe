<?php namespace PhpNFe\NFe\Tools;

class NFeInutBody
{
    /**
     * @var
     */
    protected $xml;

    public function __construct($xml)
    {
        $this->xml = $xml;
    }

    public static function loadDOM(\DOMDocument $xml)
    {
        return new self($xml->saveXML());
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeInutBody.xml');
        $xml = str_replace('{{xml}}', $this->xml, $xml);

        return (string) AjustaXML::limpaXml($xml);
    }
}
