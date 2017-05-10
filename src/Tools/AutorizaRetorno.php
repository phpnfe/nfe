<?php namespace PhpNFe\NFe\Tools;

use PhpNFe\Tools\XML;

class AutorizaRetorno extends Retorno
{
    /**
     * XML do retorno.
     *
     * @var XML
     */
    protected $retorno;

    /**
     * XML da nfe assinada.
     *
     * @var XML
     */
    protected $xml;

    /**
     * @var \DOMNode
     */
    protected $infProt;

    /**
     * AutorizaRetorno constructor.
     * @param XML $retorno
     * @param XML $xml
     */
    public function __construct(XML $retorno, XML $xml)
    {
        $this->retorno = $retorno;
        $this->xml = $xml;
        $this->infProt = $this->retorno->getElementsByTagName('infProt')->item(0);
    }

    /**
     * Retorna o código do retorno.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->infProt->getElementsByTagName('cStat')->item(0)->textContent;
    }

    /**
     * Retorna a mensagem de motivo do retorno.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->infProt->getElementsByTagName('xMotivo')->item(0)->textContent;
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
        if ($this->isError()) {
            return '';
        }

        return $this->infProt->getElementsByTagName('chNFe')->item(0)->textContent;
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