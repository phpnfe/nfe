<?php namespace PhpNFe\NFe\Tools;

use PhpNFe\Tools\XML;

class AutorizaRetorno extends Retorno
{
    /**
     * XML da nfe assinada.
     *
     * @var XML
     */
    protected $xml;

    /**
     * AutorizaRetorno constructor.
     * @param $response
     * @param XML $xml
     */
    public function __construct($response, XML $xml)
    {
        $st = new \NFePHP\NFe\Common\Standardize();
        $this->response = $st->toStd($response);

        $this->xml = $xml;
    }

    /**
     * Retorna o código do retorno.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getValue('infProt.cStat', '0');
    }

    /**
     * Retorna a mensagem de motivo do retorno.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->getValue('infProt.xMotivo', '');
    }

    /**
     * Retorna se o retorno é um erro.
     *
     * @return bool
     */
    public function isError()
    {
        return $this->getCode() != '100';
    }

    /**
     * Retorna a chave de 44 caracteres da nfe.
     *
     * @return string
     */
    public function getChNFe()
    {
        return $this->getValue('infProt.chNFe', '');
    }

    /**
     * Retorna o XML protocolado da NFe.
     *
     * @return string
     */
    public function getXML()
    {
        if ($this->isError()) {
            return '';
        }

        $versao = $this->retorno->getElementsByTagName('retEnviNFe')->item(0)->getAttribute('versao');
        $urlPortal = $this->retorno->getElementsByTagName('retEnviNFe')->item(0)->getAttribute('xmlns');

        // Prot
        $prot = $this->retorno->getElementsByTagName('protNFe')->item(0)->C14N();
        $prot = preg_replace('/\s+/', ' ', preg_replace('%xmlns:[a-z]+="[a-zA-Z0-9:/.-]+"%', '', $prot));

        $params = [];
        $params['{{portal}}'] = $urlPortal;
        $params['{{versao}}'] = $versao;
        $params['{{xml}}'] = $this->xml->C14N();
        $params['{{prot}}'] = $prot;

        $xml = file_get_contents(__DIR__ . '/../Templates/nfeAutRetorno.xml');
        $xml = strtr($xml, $params);

        return $xml;
    }
}