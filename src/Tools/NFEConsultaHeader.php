<?php namespace PhpNFe\NFe\Tools;

class NFEConsultaHeader
{
    /**
     * Codigo do Estado.
     * @var string
     */
    protected $cUF;

    /**
     * Versao dos dados.
     * @var
     */
    protected $versao;

    /**
     * NFEConsultaHeader constructor.
     * @param string $cUF
     * @param $body
     */
    public function __construct($cUF, $versao)
    {
        $this->cUF = $cUF;
        $this->versao = $versao;
    }

    /**
     * Carregar o DOM.
     * @param $cUF
     * @param $versao
     * @return NFEConsultaHeader
     */
    public static function loadDOM($cUF, $versao)
    {
        return new self($cUF, $versao);
    }

    /**
     * @return mixed|string
     */
    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeConsultaHeader.xml');
        $xml = str_replace('{{cUF}}', $this->cUF, $xml);
        $xml = str_replace('{{versaoDados}}', $this->versao, $xml);

        return $xml;
    }
}