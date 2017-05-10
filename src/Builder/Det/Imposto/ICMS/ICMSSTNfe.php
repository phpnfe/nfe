<?php namespace PhpNFe\NFe\Builder\Det\Imposto\ICMS;

/**
 * Grupo de Repasse de ICMS ST retido
 * anteriormente em operações interestaduais
 * com repasses através do Substituto
 * Tributário.
 * Grupo de informação do ICMS ST devido para a UF de destino,
 * nas operações interestaduais de produtos que tiveram retenção
 * antecipada de ICMS por ST na UF do remetente. Repasse via
 * Substituto Tributário. (v2.0).
 * Class ICMSSTNfe.
 */
class ICMSSTNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Origem da mercadoria.
     * 0 - Nacional, exceto as indicadas nos códigos 3, 4, 5 e 8;
     * 1 - Estrangeira - Importação direta, exceto a indicada no código
     * 6;
     * 2 - Estrangeira - Adquirida no mercado interno, exceto a
     * indicada no código 7;
     * 3 - Nacional, mercadoria ou bem com Conteúdo de Importação
     * superior a 40% e inferior ou igual a 70%;
     * 4 - Nacional, cuja produção tenha sido feita em conformidade
     * com os processos produtivos básicos de que tratam as
     * legislações citadas nos Ajustes;
     * 5 - Nacional, mercadoria ou bem com Conteúdo de Importação
     * inferior ou igual a 40%;
     * 6 - Estrangeira - Importação direta, sem similar nacional,
     * constante em lista da CAMEX e gás natural;
     * 7 - Estrangeira - Adquirida no mercado interno, sem similar
     * nacional, constante lista CAMEX e gás natural.
     * 8 - Nacional, mercadoria ou bem com Conteúdo de Importação
     * superior a 70%;.
     * @var string
     * @max 1
     */
    public $orig = '';

    /**
     * Tributação do ICMS.
     * 41=Não Tributado (v2.0).
     * @var string
     * @max 2
     */
    public $CST = '';

    /**
     * Valor do BC do ICMS ST retido na UF
     * remetente.
     * Informar o valor da BC do ICMS ST retido na UF remetente
     * (v2.0).
     * @var float
     * @dec 2
     */
    public $vBCSTRet = 0.00;

    /**
     * Valor do ICMS ST retido na UF remetente.
     * Informar o valor do ICMS ST retido na UF remetente (v2.0).
     * @var float
     * @dec 2
     */
    public $vICMSSTRet = 0.00;

    /**
     * Valor da BC do ICMS ST da UF destino.
     * Informar o valor da BC do ICMS ST da UF destino (v2.0).
     * @var float
     * @dec 2
     */
    public $vBCSTDest = 0.00;

    /**
     * Valor do ICMS ST da UF destino.
     * Informar o valor do ICMS ST da UF destino (v2.0).
     * @var float
     * @dec 2
     */
    public $vICMSSTDest = 0.00;
}