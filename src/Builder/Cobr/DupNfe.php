<?php namespace PhpNFe\NFe\Builder\Cobr;

class DupNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Número da Duplicata.
     * @var string|null
     * @max 60
     */
    public $nDup = null;

    /**
     * Data de vencimento.
     * @var date|null
     */
    public $dVenc = null;

    /**
     * Valor da duplicata.
     * @var float
     * @dec 2
     */
    public $vDup = 0.00;
}