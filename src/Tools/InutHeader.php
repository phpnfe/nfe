<?php namespace PhpNFe\NFe\Tools;

class InutHeader
{
    /**
     * @var
     */
    protected $cUF;

    /**
     * @var
     */
    protected $versao;

    /**
     * InutHeader constructor.
     * @param $cUF
     * @param $versao
     */
    public function __construct($cUF, $versao)
    {
        $this->cUF = $cUF;
        $this->versao = $versao;
    }

    /**
     * @param $cUF
     * @param $versao
     * @return InutHeader
     */
    public static function loadDOM($cUF, $versao)
    {
        return new self($cUF, $versao);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeCabecMsg.xml');
        $xml = str_replace('{{metodo}}', 'NfeInutilizacao2', $xml);
        $xml = str_replace('{{cUF}}', $this->cUF, $xml);
        $xml = str_replace('{{versaoDados}}', $this->versao, $xml);

        return $xml;
    }
}