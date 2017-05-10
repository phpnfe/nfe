<?php namespace PhpNFe\NFe\Tools;

class EvBody
{
    /**
     * @var
     */
    protected $idLote;

    /**
     * @var
     */
    protected $versao;

    /**
     * @var
     */
    protected $xml;

    public function __construct($idLote, $versao, $xml)
    {
        $this->idLote = $idLote;
        $this->versao = $versao;
        $this->xml = $xml;
    }

    /**
     * @param \DOMDocument $xml
     * @return EvBody
     */
    public static function loadDOM(\DOMDocument $xml)
    {
        $idLote = substr(str_replace(',', '', number_format(microtime(true) * 1000000, 0)), 0, 15);
        $versao = $xml->documentElement->getAttribute('versao');
        $xml = $xml->saveXML();

        return new self($idLote, $versao, $xml);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/evDadosMsg.xml');
        $xml = str_replace('{{idLote}}', $this->idLote, $xml);
        $xml = str_replace('{{versao}}', $this->versao, $xml);
        $xml = str_replace('{{xml}}', $this->xml, $xml);
        $xml = AjustaXML::limpaXml($xml);

        return $xml;
    }
}