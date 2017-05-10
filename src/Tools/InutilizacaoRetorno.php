<?php namespace PhpNFe\NFe\Tools;

use PhpNFe\Tools\XML;

class InutilizacaoRetorno extends Retorno
{
    /**
     * XML do Retorno.
     *
     * @var
     */
    protected $retorno;

    /**
     * @var \DOMNode
     */
    protected $retInutNFe;

    public function __construct(XML $retorno)
    {
        $this->retorno = $retorno;
        $this->retInutNFe = $this->retorno->getElementsByTagName('retInutNFe')->item(0);
    }

    /**
     * Retorna o código do retorno.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->retInutNFe->getElementsByTagName('cStat')->item(0)->textContent;
    }

    /**
     * Retorna a mensagem de motivo do retorno.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->retInutNFe->getElementsByTagName('xMotivo')->item(0)->textContent;
    }

    /**
     * Retorna se o retorno é um erro.
     *
     * @return bool
     */
    public function isError()
    {
        return $this->getCode() != '102';
    }

    /**
     * Retorna a chave de 44 caracteres da nfe.
     *
     * @return string
     */
    public function getChNFe()
    {
        return ''; // Inutilização não tem o codigo da cnfe
    }

    /**
     * Retorna o protocolo da mensagem.
     * @return mixed
     */
    public function getProt()
    {
        return $this->retInutNFe->getElementsByTagName('nProt')->item(0)->textContent;
    }

    public function getXML()
    {
        return $this->retInutNFe->C14N();
    }
}