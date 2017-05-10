<?php namespace PhpNFe\NFe\Builder\Det\Imposto;

/**
 * Informar apenas quando o item for sujeito ao II.
 * Class II.
 */
class II extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Valor BC do Imposto de Importação.
     * @var float
     * @dec 2
     */
    public $vBC = 0.00;

    /**
     * Valor despesas aduaneiras.
     * @var float
     * @dec 2
     */
    public $vDespAdu = 0.00;

    /**
     * Valor Imposto de Importação.
     * @var float
     * @dec 2
     */
    public $vII = 0.00;

    /**
     * Valor Imposto sobre Operações
     * Financeiras.
     * @var float
     * @dec 2
     */
    public $vIOF = 0.00;
}