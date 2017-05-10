<?php namespace PhpNFe\NFe\Builder\Det;

use PhpNFe\NFe\Builder\Det\Prod\ProdNfe;
use PhpNFe\NFe\Builder\Det\Imposto\ImpostoNfe;

class DetNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Detalhamento de Produtos e Serviços.
     * @var ProdNfe
     */
    public $prod;

    /**
     * Tributos incidentes no Produto ou Serviço.
     * Grupo ISSQN mutuamente exclusivo com os grupos ICMS e II,
     * isto é, se o grupo ISSQN for informado os grupos ICMS e II não
     * serão informados e vice-versa.
     * @var ImpostoNfe
     */
    public $imposto;

    /**
     * DetNfe constructor.
     */
    public function __construct()
    {
        $this->prod = new ProdNfe();
        $this->imposto = new ImpostoNfe();
    }
}