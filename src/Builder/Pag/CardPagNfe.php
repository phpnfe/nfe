<?php namespace PhpNFe\NFe\Builder\Pag;

/**
 * Grupo de Cartões.
 * Class CardPagNfe.
 */
class CardPagNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Indicador da Forma de Pagamento.
     *
     * Tipo de Integração do processo de pagamento com o sistema de automação da empresa:
     * 1=Pagamento integrado com o sistema de automação da empresa (Ex.: equipamento TEF, Comércio Eletrônico);
     * 2= Pagamento não integrado com o sistema de automação da empresa (Ex.: equipamento POS);
     *
     * @var string
     * @max 1
     */
    public $tpIntegra;

    /**
     * CNPJ da Credenciadora de cartão de crédito e/ou débito.
     *
     * Informar o CNPJ da Credenciadora de cartão de crédito / débito
     *
     * @var string|null
     * @max 14
     */
    public $CNPJ;

    /**
     * Bandeira da operadora de cartão de crédito e/ou débito.
     *
     * 01=Visa
     * 02=Mastercard
     * 03=American Express
     * 04=Sorocred
     * 05=Diners Club
     * 06=Elo
     * 07=Hipercard
     * 08=Aura
     * 09=Cabal
     * 99=Outros
     *
     * @var string|null
     * @dec 2
     */
    public $tBand = 0;

    /**
     * Número de autorização da operação cartão de crédito e/ou débito.
     *
     * Identifica o número da autorização da transação da operação com cartão de crédito e/ou débito.
     *
     * @var string|null
     * @max 20
     */
    public $cAut;
}