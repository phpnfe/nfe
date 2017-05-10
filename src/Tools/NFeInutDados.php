<?php namespace PhpNFe\NFe\Tools;

class NFeInutDados
{
    /**
     * @var
     */
    protected $versao;

    /**
     * @var
     */
    protected $idInut;

    /**
     * @var
     */
    protected $tpAmb;

    /**
     * @var
     */
    protected $cUF;

    /**
     * @var
     */
    protected $sAno;

    /**
     * @var
     */
    protected $cnpj;

    /**
     * @var
     */
    protected $mod;

    /**
     * @var
     */
    protected $serie;

    /**
     * @var
     */
    protected $nIni;

    /**
     * @var
     */
    protected $nFin;

    /**
     * @var
     */
    protected $xJust;

    /**
     * NFeInutDados constructor.
     * @param $urlPortal
     * @param $versao
     * @param $idInut
     * @param $tpAmb
     * @param $xServ
     * @param $cUF
     * @param $sAno
     * @param $cnpj
     * @param $mod
     * @param $nIni
     * @param $nFin
     * @param $xJust
     */
    public function __construct($versao, $idInut, $tpAmb, $cUF, $sAno, $cnpj, $mod, $serie, $nIni, $nFin, $xJust)
    {
        $this->versao = $versao;
        $this->idInut = $idInut;
        $this->tpAmb = $tpAmb;
        $this->cUF = $cUF;
        $this->sAno = $sAno;
        $this->cnpj = $cnpj;
        $this->mod = $mod;
        $this->serie = $serie;
        $this->nIni = $nIni;
        $this->nFin = $nFin;
        $this->xJust = $xJust;
    }

    public static function loadDOM($sAno, $cnpj, $serie, $nIni, $nFin, $xJust, $method)
    {
        $mod = '55';
        $versao = $method->version;
        $tpAmb = $method->amb;
        $cUF = $method->cuf;
        $nSerie = str_pad($serie, 3, '0', STR_PAD_LEFT);
        $sIni = str_pad($nIni, 9, '0', STR_PAD_LEFT);
        $sFin = str_pad($nFin, 9, '0', STR_PAD_LEFT);
        $idInut = sprintf('ID%s', $cUF . $sAno . $cnpj . $mod . $nSerie . $sIni . $sFin);

        return new self($versao, $idInut, $tpAmb, $cUF, $sAno, $cnpj, $mod, $serie, $nIni, $nFin, $xJust);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeInutMsg.xml');
        $xml = str_replace('{{versao}}', $this->versao, $xml);
        $xml = str_replace('{{idInut}}', $this->idInut, $xml);
        $xml = str_replace('{{tpAmb}}', Sefaz::$ambientes[$this->tpAmb], $xml);
        $xml = str_replace('{{cUF}}', $this->cUF, $xml);
        $xml = str_replace('{{sAno}}', $this->sAno, $xml);
        $xml = str_replace('{{cnpj}}', $this->cnpj, $xml);
        $xml = str_replace('{{mod}}', $this->mod, $xml);
        $xml = str_replace('{{serie}}', $this->serie, $xml);
        $xml = str_replace('{{nIni}}', $this->nIni, $xml);
        $xml = str_replace('{{nFin}}', $this->nFin, $xml);
        $xml = str_replace('{{xJust}}', $this->xJust, $xml);

        return (string) AjustaXML::limpaXml($xml);
    }
}