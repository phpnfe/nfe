<?php namespace PhpNFe\NFe\Builder\Det\Imposto\PIS;

class PISQtdeNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Código de Situação Tributária do PIS.
     * 03=Operação Tributável (base de cálculo = quantidade vendida
     * x alíquota por unidade de produto);.
     * @var string
     * @max 2
     */
    public $CST = '';

    /**
     * Quantidade Vendida.
     * @var float
     * @dec 4
     */
    public $qBCProd = 0.00;

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