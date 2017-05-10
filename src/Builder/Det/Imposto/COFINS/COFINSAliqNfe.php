<?php namespace PhpNFe\NFe\Builder\Det\Imposto\COFINS;

class COFINSAliqNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Código de Situação Tributária da COFINS E.
     * 01=Operação Tributável (base de cálculo = valor da operação
     * alíquota normal (cumulativo/não cumulativo));
     * 02=Operação Tributável (base de cálculo = valor da operação
     * (alíquota diferenciada));.
     * @var string
     * @max 2
     */
    public $CST = '';

    /**
     * Valor da Base de Cálculo da COFINS.
     * @var float
     * @dec 2
     */
    public $vBC = 0.00;

    /**
     * Alíquota da COFINS (em percentual).
     * @var float
     * @dec 4
     */
    public $pCOFINS = 0.00;

    /**
     * Valor da COFINS.
     * @var float
     * @dec 2
     */
    public $vCOFINS = 0.00;
}