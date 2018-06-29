<?php namespace PhpNFe\NFe\Builder\Pag;

use PhpNFe\Tools\Builder\Colecoes;

/**
 * Grupo Pagamento.
 *
 * Obrigatório o preenchimento do Grupo Informações de Pagamento para NF-e e NFC-e.
 * Para as notas com finalidade de Ajuste ou Devolução o campo Meio de Pagamento
 * deve ser preenchido com 90=Sem Pagamento.
 *
 * Class PagNfe.
 */
class PagNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Grupo Detalhamento do Pagamento.
     * @var Colecoes
     */
    public $detPag;

    /**
     * Valor do troco.
     * @var null|float
     * @dec 2
     */
    public $vTroco;

    /**
     * CobrNfe constructor.
     */
    public function __construct()
    {
        $this->detPag = new Colecoes([]);
    }
}