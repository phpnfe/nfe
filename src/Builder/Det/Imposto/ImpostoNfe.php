<?php namespace PhpNFe\NFe\Builder\Det\Imposto;

use PhpNFe\NFe\Builder\Det\Imposto\IPI\IPINfe;
use PhpNFe\NFe\Builder\Det\Imposto\PIS\PISNfe;
use PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMSNfe;
use PhpNFe\NFe\Builder\Det\Imposto\COFINS\COFINSNfe;

/**
 * Tributos incidentes no Produto ou Serviço.
 * Grupo ISSQN mutuamente exclusivo com os grupos ICMS e II,
 * isto é, se o grupo ISSQN for informado os grupos ICMS e II não
 * serão informados e vice-versa.
 * Class ImpostoNfe.
 */
class ImpostoNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Valor aproximado total de tributos federais,
     * estaduais e municipais.
     * (NT 2013/003).
     * @var float|null
     * @dec 2
     */
    public $vTotTrib = null;

    /**
     * Informações do ICMS da Operação própria
     * e ST.
     * Informar apenas um dos grupos de tributação do ICMS
     * (ICMS00, ICMS10, ...) (v2.0).
     * @var ICMSNfe
     */
    public $ICMS;

    /**
     * Grupo IPI.
     * Informar apenas quando o item for sujeito ao IPI.
     * @var IPINfe
     */
    public $IPI;

    /**
     * Grupo Imposto de Importação
     * Informar apenas quando o item for sujeito ao II.
     * @var II
     */
    public $II;

    /**
     * Informar apenas um dos grupos Q02, Q03, Q04 ou Q05 com
     * base valor atribuído ao campo Q06 – CST do PIS.
     * @var PISNfe
     */
    public $PIS;

    /**
     * Grupo COFINS.
     * Informar apenas um dos grupos S02, S03, S04 ou S04 com
     * base valor atribuído ao campo de CST da COFINS.
     * @var COFINSNfe
     */
    public $COFINS;

    /**
     * Grupo a ser informado nas vendas interestaduais para consumidor
     * final, não contribuinte do ICMS.
     * @var ICMSUFDest
     */
    public $ICMSUFDest;

    /**
     * ImpostoNfe constructor.
     */
    public function __construct()
    {
        $this->ICMS = new ICMSNfe();
        $this->IPI = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\IPI\IPINfe');
        $this->II = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\II');
        $this->PIS = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\PIS\PISNfe');
        $this->COFINS = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\COFINS\COFINSNfe');
        $this->ICMSUFDest = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMSUFDest');
    }
}