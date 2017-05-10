<?php namespace PhpNFe\NFe\Builder\Det\Imposto\COFINS;

class COFINSQtde extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Código de Situação Tributária da COFINS.
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
     * Alíquota da COFINS (em reais).
     * @var float
     * @dec 4
     */
    public $vAliqProd = 0.00;

    /**
     * Valor da COFINS.
     * @var float
     * @dec 2
     */
    public $vCOFINS = 0.00;
}