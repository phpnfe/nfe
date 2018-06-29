<?php namespace PhpNFe\NFe\Tools;

class AutorizaRetorno extends Retorno
{
    /**
     * XML da resposta.
     *
     * @var string
     */
    protected $xmlResponse;

    /**
     * XML da nfe assinada.
     *
     * @var string
     */
    protected $xmlAssigned;

    /**
     * XML protocolado.
     *
     * @var string
     */
    protected $xmlProtocoled;

    /**
     * AutorizaRetorno constructor.
     * @param string $response
     * @param string $xml
     */
    public function __construct($response, $xml)
    {
        $this->xmlResponse = $response;
        $this->xmlAssigned = $xml;

        $st = new \NFePHP\NFe\Common\Standardize();
        $this->response = $st->toStd($response);
    }

    /**
     * Retorna o código do retorno.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getValue('protNFe.infProt.cStat', '0');
    }

    /**
     * Retorna a mensagem de motivo do retorno.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->getValue('protNFe.infProt.xMotivo', '');
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
        return $this->getValue('protNFe.infProt.chNFe', '');
    }

    /**
     * Retorna o numero do protocolo de autorizacao.
     *
     * @return string
     */
    public function getNProt()
    {
        return $this->getValue('protNFe.infProt.nProt', '');
    }

    /**
     * Retorna o digVal do protocolo.
     *
     * @return string
     */
    public function getDigVal()
    {
        return $this->getValue('protNFe.infProt.digVal', '');
    }

    /**
     * Retorna o XML assinado e protocolado.
     *
     * @return string
     */
    public function getXML()
    {
        if ($this->isError()) {
            return '';
        }

        if (! is_null($this->xmlProtocoled)) {
            return $this->xmlProtocoled;
        }

        $protocol = new \NFePHP\NFe\Factories\Protocol();
        return $this->xmlProtocoled = $protocol->add($this->xmlAssigned, $this->xmlResponse);
    }
}