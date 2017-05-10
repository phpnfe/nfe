<?php namespace PhpNFe\NFe\Builder\InfAdic;

class ObsFiscoNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Identificação do campo.
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