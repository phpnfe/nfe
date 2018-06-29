<?php namespace PhpNFe\NFe\Builder\Pag;

/**
 * Grupo Detalhamento do Pagamento.
 * Class FatNfe.
 */
class DetPagNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Indicador da Forma de Pagamento.
     *
     * 0= Pagamento à Vista
     * 1= Pagamento à Prazo
     *
     * @var string
     * @max 1
     */
    public $indPag = '0';

    /**
     * Meio de pagamento.
     *
     * 01=Dinheiro
     * 02=Cheque
     * 03=Cartão de Crédito
     * 04=Cartão de Débito
     * 05=Crédito Loja
     * 10=Vale Alimentação
     * 11=Vale Refeição
     * 12=Vale Presente
     * 13=Vale Combustível
     * 15=Boleto Bancário
     * 90=Sem pagamento
     * 99=Outros
     *
     * @var string
     * @max 2
     */
    public $tPag = '99';

    /**
     * Valor do Pagamento.
     * @var float
     * @dec 2
     */
    public $vPag = 0;

    /**
     * Grupo de Cartões.
     * @var CardPagNfe
     */
    public $card;

    /**
     * DetPagNfe constructor.
     */
    public function __construct()
    {
        $this->card = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Pag\CardPagNfe');
    }
}