<?php namespace PhpNFe\NFe\Builder\Transp\Vol;

/**
 * Grupo Volumes.
 * (NT 2012/003)
 * Class VolNfe.
 */
class VolNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Quantidade de volumes transportados.
     * @var string|null
     * @max 15
     */
    public $qVol = null;

    /**
     * Espécie dos volumes transportados.
     * @var string|null
     * @max 60
     */
    public $esp = null;

    /**
     * Marca dos volumes transportados.
     * @var string|null
     * @max 60
     */
    public $marca = null;

    /**
     * Numeração dos volumes transportados.
     * @var string|null
     * @max 60
     */
    public $nVol = null;

    /**
     * Peso Líquido (em kg).
     * @var float|null
     * @dec 3
     */
    public $pesoL = null;

    /**
     * Peso Bruto (em kg).
     * @var float|null
     * @dec 3
     */
    public $pesoB = null;

    /**
     * Grupo Lacres.
     * @var LacresNfe
     */
    public $lacres;

    public function __construct()
    {
        $this->lacres = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\Builder\Transp\Vol\LacresNfe');
    }
}