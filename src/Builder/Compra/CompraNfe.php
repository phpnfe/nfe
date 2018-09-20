<?php namespace PhpNFe\NFe\Builder\Compra;

class CompraNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Nota de Empenho.
     * Identificação da Nota de Empenho, quando se tratar de compras públicas (NT 2011/004).
     *
     * @var string|null
     * @max 22
     */
    public $xNEmp = null;

    /**
     * Pedido.
     * Informar o pedido.
     *
     * @var string|null
     * @max 60
     */
    public $xPed = null;

    /**
     * Contrato.
     * Informar o contrato de compra.
     *
     * @var string|null
     * @max 60
     */
    public $xCont = null;
}