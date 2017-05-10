<?php namespace PhpNFe\NFe\Tools;

class NFEConsultaMsg
{
    /**
     * Ambiente.
     * @var string
     */
    protected $tpAmb;

    /**
     * Serviço Solicitado = 'CONSULTAR'.
     * @var string
     */
    protected $xServ;

    /**
     * Chave da NFe.
     * @var string
     */
    protected $chNFe;

    /**
     * NFEConsultaMsg constructor.
     * @param $tpAmb
     * @param $xServ
     * @param $chNFe
     */
    public function __construct($tpAmb, $chNFe, $xServ)
    {
        $this->tpAmb = $tpAmb;
        $this->chNFe = $chNFe;
        $this->xServ = $xServ;
    }

    /**
     * Carregar o DOM.
     * @param $tpAmb
     * @param $xServ
     * @param $chNFe
     * @return NFEConsultaMsg
     */
    public static function loadDOM($tpAmb, $chNFe, $xServ = 'CONSULTAR')
    {
        return new self($tpAmb, $chNFe, $xServ);
    }

    /**
     * @return mixed|string
     */
    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeConsultaMsg.xml');
        $xml = str_replace('{{tpAmb}}', $this->tpAmb, $xml);
        $xml = str_replace('{{xServ}}', $this->xServ, $xml);
        $xml = str_replace('{{chNFe}}', $this->chNFe, $xml);

        return $xml;
    }
}