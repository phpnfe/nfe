<?php namespace PhpNFe\NFe\Builder\InfAdic;

class ObsContNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Grupo Campo de uso livre do contribuinte.
     * @var string
     * @max 20
     */
    public $xCampo = '';

    /**
     * Conteúdo do campo.
     * @var string
     * @max 60
     */
    public $xTexto = '';
}