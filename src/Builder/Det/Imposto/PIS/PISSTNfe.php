<?php namespace PhpNFe\NFe\Builder\Det\Imposto\PIS;

class PISSTNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Valor da Base de Cálculo do PIS.
     * @var float
     * @dec 2
     */
    public $vBC = 0.00;

    /**
     * Alíquota do PIS (em percentual).
     * @var float
     * @dec 4
     */
    public $pPIS = '';

    /**
     * Quantidade Vendida.
     * @var float
     * @dec 4
     */
    public $qBCProd = '';

    /**
     * Alíquota do PIS (em reais).
     * @var float
     * @dec 4
     */
    public $vAliqProd = 0.00;

    /**
     * Valor do PIS.
     * @var float
     * @dec 2
     */
    public $vPIS = 0.00;
}