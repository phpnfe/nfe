<?php namespace PhpNFe\NFe\Tools;

use PhpNFe\Tools\XML;

class ConsultaRetorno
{
    /**
     * Xml de retorno.
     * @var
     */
    protected $retorno;

    /**
     * Código do status da resposta.
     * @var
     */
    protected $cStat;

    /**
     * Descrição literal do status da resposta.
     * @var
     */
    protected $xMotivo;

    /**
     * Preenchido com a data e hora do processamento.
     * Formato: “AAAA-MM-DDThh:mm:ssTZD” (UTC -
     * Universal Coordinated Time).
     * @var
     */
    protected $dhRecbto;

    /**
     * Protocolo de autorização ou denegação de uso do
     * NF-e (vide item 4.2.2). Informar se localizada uma
     * NF-e com cStat = 100-uso autorizado, 150-uso
     * autorizado fora de prazo ou 110-uso denegado.
     * (NT 2012/003).
     * @var
     */
    protected $protNFe;

    /**
     * Protocolo de homologação de cancelamento de
     * NF-e (vide item 4.3.2). Informar se localizada uma
     * NF-e com cStat = 101-cancelado ou 151-
     * cancelado fora de prazo. (NT 2012/003).
     * @var
     */
    protected $retCancNFe;

    /**
     * Informação do evento e respectivo Protocolo de
     * registro de Evento.
     * @var
     */
    protected $procEventoNFe;

    /**
     * ConsultaRetorno constructor.
     * @param XML $retorno
     */
    public function __construct(XML $retorno)
    {
        $this->retorno = $retorno;
    }

    /**
     * Retorna a mensagem inteira.
     * @return string
     */
    public function getMensagem()
    {
        return $this->retorno->saveXML();
    }

    /**
     * Retorna o protocolo.
     *
     * Informação do evento e respectivo Protocolo de
     * registro de Evento.
     * @return string
     */
    public function getProt()
    {
        return $this->retorno->getElementsByTagName('nProt')->item(0)->textContent;
    }

    /**
     * Retorna a chave da NF-e.
     * @return string
     */
    public function getChNFe()
    {
        return $this->retorno->getElementsByTagName('chNFe')->item(0)->textContent;
    }

    /**
     * Retorna a data de recebimento da mensagem.
     * @return string
     */
    public function getDataReceb()
    {
        return $this->retorno->getElementsByTagName('dhRecbto')->item(0)->textContent;
    }

    /**
     * Retorna o motivo da mensagem.
     * @return string
     */
    public function getMotivo()
    {
        return $this->retorno->getElementsByTagName('xMotivo')->item(0)->textContent;
    }

    /**
     * Retorna o código da mensagem.
     * @return string
     */
    public function getCode()
    {
        return $this->retorno->getElementsByTagName('cStat')->item(0)->textContent;
    }
}