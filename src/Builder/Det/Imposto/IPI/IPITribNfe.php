<?php namespace PhpNFe\NFe\Builder\Det\Imposto\IPI;

class IPITribNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Código da situação tributária do IPI.
     * 00=Entrada com recuperação de crédito
     * 49=Outras entradas
     * 50=Saída tributada
     * 99=Outras saídas.
     * @var string
     * @max 2
     */
    public $CST;

    /**
     * Valor da BC do IPI.
     * @var float
     * @dec 2
     */
    public $vBC;

    /**
     * Alíquota do IPI.
     * @var float
     * @dec 4
     */
    public $pIPI;

    /**
     * Quantidade total na unidade padrão para
     * tributação (somente para os produtos
     * tributados por unidade)
     * 4 por unidade.
     * @var float
     * @dec 4
     */
    public $qUnid;

    /**
     * Valor por Unidade Tributável.
     * @var float
     * @dec 4
     */
    public $vUnid;

    /**
     * Valor do IPI.
     * @var float
     * @dec 2
     */
    public $vIPI;
}