<?php namespace PhpNFe\NFe\Tools;

class NFEBody
{
    /**
     * @var string
     */
    protected $versao = '';

    /**
     * @var string
     */
    protected $idLote = '';

    /**
     * @var string
     */
    protected $idSinc = '';

    /**
     * @var string
     */
    protected $xml = '';

    public function __construct($versao = '', $idLote = '', $idSinc = '', $xml = '')
    {
        $this->versao = $versao;
        $this->idLote = $idLote;
        $this->idSinc = $idSinc;
        $this->xml = $xml;
    }

    /**
     * @param \DOMDocument $xml
     * @param $metodo
     * @param $tag
     * @param $root
     * @param $opcaoXml
     * @return NFEBody
     */
    public static function loadDOM(\DOMDocument $xml)
    {
        // Pegar versão
        $node = $xml->getElementsByTagName('infNFe')->item(0);
        $versao = $node->getAttribute('versao');
        $idLote = substr(str_replace(',', '', number_format(microtime(true) * 1000000, 0)), 0, 15);
        $xml = $xml->saveXML();

        return new self($versao, $idLote, '', $xml);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeDadosMsg.xml');
        $xml = str_replace('{{versao}}', $this->versao, $xml);
        $xml = str_replace('{{idlote}}', $this->idLote, $xml);
        $xml = str_replace('{{indSinc}}', '1', $xml);
        $xml = str_replace('{{xml}}', $this->xml, $xml);
        $xml = AjustaXML::limpaXml($xml);

        return $xml;
    }
}