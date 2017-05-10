<?php namespace PhpNFe\NFe\Builder\Det\Imposto\IPI;

class IPINTNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Código da situação tributária do IPI.
     * 01=Entrada tributada com alíquota zero
     * 02=Entrada isenta
     * 03=Entrada não-tributada
     * 04=Entrada imune
     * 05=Entrada com suspensão
     * 51=Saída tributada com alíquota zero
     * 52=Saída isenta
     * 53=Saída não-tributada
     * 54=Saída imune
     * 55=Saída com suspensão.
     * @var string
     * @max 2
     */
    public $CST = '';
}