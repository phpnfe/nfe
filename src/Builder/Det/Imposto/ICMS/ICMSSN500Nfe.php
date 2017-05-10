<?php namespace PhpNFe\NFe\Builder\Det\Imposto\ICMS;

/**
 * Grupo CRT=1 – Simples Nacional e
 * CSOSN = 500
 * Tributação ICMS pelo Simples Nacional, CSOSN=500 (v2.0).
 * Class ICMSSN500Nfe.
 */
class ICMSSN500Nfe extends \PhpNFe\Tools\Builder\Builder
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
     * Código de Situação da Operação –
     * Simples Nacional
     * 500=ICMS cobrado anteriormente por substituição tributária
     * (substituído) ou por antecipação. (v2.0).
     * @var string
     * @max 3
     */
    public $CSOSN = '';

    /**
     * Valor da BC do ICMS ST retido.
     * Valor da BC do ICMS ST cobrado anteriormente por ST (v2.0).
     * O valor pode ser omitido quando a legislação não exigir a sua
     * informação. (NT 2011/004).
     * @var float
     * @dec 2
     */
    public $vBCSTRet = 0.00;

    /**
     * Valor do ICMS ST retido.
     * Valor do ICMS ST cobrado anteriormente por ST (v2.0). O valor
     * pode ser omitido quando a legislação não exigir a sua
     * informação. (NT 2011/004).
     * @var float
     * @dec 2
     */
    public $vICMSSTRet = 0.00;
}