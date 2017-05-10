<?php namespace PhpNFe\NFe\Tools;

use PhpNFe\Tools\XML;

class EventoRetorno extends Retorno
{
    /**
     * XML do Retorno.
     *
     * @var
     */
    protected $retorno;

    /**
     * XML da nfe assinada.
     *
     * @var
     */
    protected $xml;

    /**
     * @var
     */
    protected $infEvento;

    public function __construct(XML $retorno, XML $xml)
    {
        $this->retorno = $retorno;
        $this->xml = $xml;
        $this->infEvento = $this->retorno->getElementsByTagName('infEvento')->item(0);
    }

    /**
     * Retorna o código do retorno.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->infEvento->getElementsByTagName('cStat')->item(0)->textContent;
    }

    /**
     * Retorna a mensagem de motivo do retorno.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->infEvento->getElementsByTagName('xMotivo')->item(0)->textContent;
    }

    /**
     * Retorna se o retorno é um erro.
     *
     * @return bool
     */
    public function isError()
    {
        return $this->getCode() != '135';
    }

    /**
     * Retorna o protocolo da mensagem.
     * @return mixed
     */
    public function getProt()
    {
        return $this->infEvento->getElementsByTagName('nProt')->item(0)->textContent;
    }

    /**
     * Retorna a chave de 44 caracteres da nfe.
     *
     * @return string
     */
    public function getChNFe()
    {
        return $this->infEvento->getElementsByTagName('chNFe')->item(0)->textContent;
    }

    public function getXML()
    {
        if ($this->isError()) {
            return '';
        }

        $versao = $this->retorno->getElementsByTagName('retEvento')->item(0)->getAttribute('versao');

        return EvCCXmlRetorno::loadDOM($this->xml,
            $this->retorno->getElementsByTagName('retEvento')->item(0)->C14N(), $versao);
    }
}