<?php namespace PhpNFe\NFe\Builder\Cobr;

use PhpNFe\Tools\Builder\Colecoes;

/**
 * Grupo Cobrança.
 * Class CobrNfe.
 */
class CobrNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Grupo Fatura.
     * @var FatNfe
     */
    public $fat;

    /**
     * Grupo Duplicata.
     * @var Colecoes
     */
    public $dup;

    /**
     * CobrNfe constructor.
     */
    public function __construct()
    {
        $this->fat = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Cobr\FatNfe');
        $this->dup = new Colecoes([]);
    }
}