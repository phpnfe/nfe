<?php namespace PhpNFe\NFe\Tools;

class EvCancelaDados
{
    /**
     * @var
     */
    protected $cOrgao;

    /**
     * @var
     */
    protected $tpAmb;

    /**
     * @var
     */
    protected $cnpj;

    /**
     * @var
     */
    protected $chNFe;

    /**
     * @var
     */
    protected $dhEvento;

    /**
     * @var
     */
    protected $tpEvento;

    /**
     * @var
     */
    protected $nSeqEvento;

    /**
     * @var
     */
    protected $versao;

    /**
     * @var
     */
    protected $descEvento;

    /**
     * @var
     */
    protected $tagAdic;

    /**
     * @var
     */
    protected $xJust;

    /**
     * @var
     */
    protected $nProt;

    /**
     * @var
     */
    protected $eventId;

    public function __construct($cOrgao, $tpAmb, $cnpj, $chNFe, $dhEvento, $tpEvento, $nSeqEvento,
                                $versao, $descEvento, $tagAdic, $xJust, $nProt, $eventId)
    {
        $this->cOrgao = $cOrgao;
        $this->tpAmb = $tpAmb;
        $this->cnpj = $cnpj;
        $this->chNFe = $chNFe;
        $this->dhEvento = $dhEvento;
        $this->tpEvento = $tpEvento;
        $this->nSeqEvento = $nSeqEvento;
        $this->versao = $versao;
        $this->descEvento = $descEvento;
        $this->tagAdic = $tagAdic;
        $this->xJust = $xJust;
        $this->nProt = $nProt;
        $this->eventId = $eventId;
    }

    public static function loadDOM(\DOMDocument $xml, $xJust, $nSeqEvento)
    {
        $versao = '1.00';

        $cnpj = $xml->getElementsByTagName('CNPJ')->item(0)->textContent;
        $chNFe = str_replace('NFe', '', $xml->getElementsByTagName('infNFe')->item(0)->getAttribute('Id'));
        $dhEvento = (string) str_replace(' ', 'T', date('Y-m-d H:i:sP'));
        $tpEvento = '110111';
        $sSeqEvento = str_pad($nSeqEvento, 2, '0', STR_PAD_LEFT);

        $eventId = 'ID' . $tpEvento . $chNFe . $sSeqEvento;

        $nProt = $xml->getElementsByTagName('nProt')->item(0)->textContent;

        $tagAdic = "<nProt>$nProt</nProt><xJust>$xJust</xJust>";

        $descEvento = 'Cancelamento';

        $cOrgao = $xml->getElementsByTagName('cUF')->item(0)->textContent;
        $tpAmb = $xml->getElementsByTagName('tpAmb')->item(0)->textContent;

        return new self($cOrgao, $tpAmb, $cnpj, $chNFe, $dhEvento, $tpEvento,
                        $nSeqEvento, $versao, $descEvento, $tagAdic, $xJust, $nProt, $eventId);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/evCancelaMsg.xml');
        $xml = str_replace('$cOrgao', $this->cOrgao, $xml);
        $xml = str_replace('$tpAmb', $this->tpAmb, $xml);
        $xml = str_replace('$cnpj', $this->cnpj, $xml);
        $xml = str_replace('$chNFe', $this->chNFe, $xml);
        $xml = str_replace('$dhEvento', $this->dhEvento, $xml);
        $xml = str_replace('$tpEvento', $this->tpEvento, $xml);
        $xml = str_replace('$nSeqEvento', $this->nSeqEvento, $xml);
        $xml = str_replace('$versao', $this->versao, $xml);
        $xml = str_replace('$descEvento', $this->descEvento, $xml);
        $xml = str_replace('$tagAdic', $this->tagAdic, $xml);
        $xml = str_replace('$nProt', $this->nProt, $xml);
        $xml = str_replace('$xJust', $this->xJust, $xml);
        $xml = str_replace('$eventId', $this->eventId, $xml);

        $xml = AjustaXML::limpaXml($xml);

        return $xml;
    }
}