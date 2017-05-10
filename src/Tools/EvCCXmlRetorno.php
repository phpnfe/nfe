<?php namespace PhpNFe\NFe\Tools;

class EvCCXmlRetorno
{
    /**
     * @var
     */
    protected $versao;

    /**
     * @var
     */
    protected $signedMsg;

    /**
     * @var
     */
    protected $retEvento;

    public function __construct($versao, $signedMsg, $retEvento)
    {
        $this->versao = $versao;
        $this->signedMsg = $signedMsg;
        $this->retEvento = $retEvento;
    }

    public static function loadDOM($signedMsg, $retEvento, $versao)
    {
        return new self($versao, $signedMsg, $retEvento);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/evCCXmlRetorno.xml');
        $xml = str_replace('{{versao}}', $this->versao, $xml);
        $xml = str_replace('{{signedMsg}}', AjustaXML::limpaXml($this->signedMsg), $xml);
        $xml = str_replace('{{retEvento}}', $this->retEvento, $xml);

        return $xml;
    }
}