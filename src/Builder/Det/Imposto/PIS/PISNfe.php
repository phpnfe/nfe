<?php namespace PhpNFe\NFe\Builder\Det\Imposto\PIS;

class PISNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Grupo PIS tributado pela alíquota.
     * @var PISAliqNfe
     */
    public $PISAliq;

    /**
     * Grupo PIS tributado por Qtde.
     * @var PISQtdeNfe
     */
    public $PISQtde;

    /**
     * Grupo PIS não tributado.
     * @var PISNTNfe;
     */
    public $PISNT;

    /**
     * Grupo PIS Outras Operações.
     * @var PISOutrNfe
     */
    public $PISOutr;

    public function __construct()
    {
        $this->PISAliq = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\PIS\PISAliqNfe');
        $this->PISQtde = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\PIS\PISQtdeNfe');
        $this->PISNT = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\PIS\PISNTNfe');
        $this->PISOutr = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\PIS\PISOutrNfe');
    }
}