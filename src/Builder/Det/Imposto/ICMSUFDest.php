<?php namespace PhpNFe\NFe\Builder\Det\Imposto;

/**
 * Informar apenas quando a venda se tratar de uma transação interestadual para um cliente sem IE.
 * Class ICMSUFDest.
 */
class ICMSUFDest extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Valor da Base de Cálculo do ICMS na UF de destino.
     * @var float
     * @dec 2
     */
    public $vBCUFDest = 0.00;

    /**
     * Percentual adicional inserido na alíquota interna da UF de destino, relativo ao Fundo de Combate à
     * Pobreza (FCP) naquela UF.
     * @var float
     * @dec 4
     */
    public $pFCPUFDest = 0.00;

    /**
     * Alíquota adotada nas operações internas na UF de destino para o produto / mercadoria.
     * A alíquota do Fundo de Combate a Pobreza, se existente para o produto / mercadoria,
     * deve ser informada no campo próprio (pFCPUFDest) não devendo ser somada à essa alíquota interna.
     * @var float
     * @dec 4
     */
    public $pICMSUFDest = 0.00;

    /**
     * Alíquota interestadual das UF envolvidas
     * Financeiras.
     * @var float
     * @dec 2
     */
    public $pICMSInter = 0.00;

    /**
     * Percentual de ICMS Interestadual para a UF de destino.
     * @var float
     * @dec 2
     */
    public $pICMSInterPart = 0.00;

    /**
     * Valor do ICMS relativo ao Fundo de Combate à Pobreza (FCP) da UF de destino.
     * @var float
     * @dec 2
     */
    public $vFCPUFDest = 0.00;

    /**
     * Valor do ICMS Interestadual para a UF de destino, já considerando o valor do ICMS relativo ao
     * Fundo de Combate à Pobreza naquela UF.
     * @var float
     * @dec 2
     */
    public $vICMSUFDest = 0.00;

    /**
     * Valor do ICMS Interestadual para a UF do remetente.
     * @var float
     * @dec 2
     */
    public $vICMSUFRemet = 0.00;
}