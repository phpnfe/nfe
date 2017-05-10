<?php namespace PhpNFe\NFe\Builder\Det\Imposto\PIS;

class PISAliqNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Código de Situação Tributária do PIS.
     * 01=Operação Tributável (base de cálculo = valor da operação
     * alíquota normal (cumulativo/não cumulativo));
     * 02=Operação Tributável (base de cálculo = valor da operação
     * (alíquota diferenciada));.
     * @var string
     * @max 2
     */
    public $CST = '';

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
    public $pPIS = 0.00;

    /**
     * Valor do PIS.
     * @var float
     * @dec 2
     */
    public $vPIS = 0.00;
}