<?php namespace PhpNFe\NFe\Builder\Total;

/**
 * Grupo Informações do Transporte.
 * Class RetTribNfe.
 */
class RetTribNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Valor Retido de PIS.
     * @var float|null
     * @dec 2
     */
    public $vRetPIS = null;

    /**
     * Valor Retido de COFINS.
     * @var float|null
     * @dec 2
     */
    public $vRetCOFINS = null;

    /**
     * Valor Retido de CSLL.
     * @var float|null
     * @dec 2
     */
    public $vRetCSLL = null;

    /**
     * Base de Cálculo do IRRF.
     * @var float|null
     * @dec 2
     */
    public $vBCIRRF = null;

    /**
     * Valor Retido do IRRF.
     * @var float|null
     * @dec 2
     */
    public $vIRRF = null;

    /**
     * Base de Cálculo da Retenção da.
     * @var float|null
     * @dec 2
     */
    public $vBCRetPrev = null;

    /**
     * Valor da Retenção da Previdência Social.
     * @var float|null
     * @dec 2
     */
    public $vRetPrev = null;
}