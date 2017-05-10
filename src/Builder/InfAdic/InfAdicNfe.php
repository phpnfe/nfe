<?php namespace PhpNFe\NFe\Builder\InfAdic;

class InfAdicNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Informações Adicionais de Interesse do
     * Fisco.
     * @var string|null
     * @max 2000
     */
    public $infAdFisco = null;

    /**
     * Informações Complementares de interesse
     * do Contribuinte.
     * @var string|null
     * @max 5000
     */
    public $infCpl = null;

    /**
     * Grupo Campo de uso livre do contribuinte
     * Campo de uso livre do contribuinte, Informar o nome do campo
     * no atributo xCampo e o conteúdo do campo no xTexto.
     * @var ObsContNfe
     */
    public $obsCont;

    /**
     * Grupo Campo de uso livre do Fisco.
     * @var ObsFiscoNfe
     */
    public $obsFisco;

    /**
     * Grupo Processo referenciado.
     * @var ProcRefNfe
     */
    public $procRef;

    public function __construct()
    {
        $this->obsCont = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\Builder\InfAdic\ObsContNfe');
        $this->obsFisco = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\Builder\InfAdic\ObsFiscoNfe');
        $this->procRef = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\Builder\InfAdic\ProcRefNfe');
    }
}