<?php namespace PhpNFe\NFe\Builder\Det\Imposto\ICMS;

/**
 * Grupo CRT=1 – Simples Nacional e
 * CSOSN=202 ou 203.
 * Tributação ICMS pelo Simples Nacional, CSOSN=202 ou 203
 * (v2.0).
 * Class ICMSSN202Nfe.
 */
class ICMSSN202Nfe extends \PhpNFe\Tools\Builder\Builder
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
     * Simples Nacional.
     * 202=Tributada pelo Simples Nacional sem permissão de crédito
     * e com cobrança do ICMS por Substituição Tributária;
     * 203- Isenção do ICMS nos Simples Nacional para faixa de
     * receita bruta e com cobrança do ICMS por Substituição
     * Tributária (v2.0).
     * @var string
     * @max 3
     */
    public $CSOSN = '';

    /**
     * Modalidade de determinação da BC do
     * ICMS ST.
     * 0=Preço tabelado ou máximo sugerido;
     * 1=Lista Negativa (valor);
     * 2=Lista Positiva (valor);
     * 3=Lista Neutra (valor);
     * 4=Margem Valor Agregado (%);
     * 5=Pauta (valor); (v2.0).
     * @var string
     * @max 1
     */
    public $modBCST = '';

    /**
     * Percentual da margem de valor Adicionado
     * do ICMS ST.
     * (v2.0).
     * @var float|null
     * @dec 4
     */
    public $pMVAST = null;

    /**
     * Percentual da Redução de BC do ICMS ST.
     * (v2.0).
     * @var float|null
     * @dec 4
     */
    public $pRedBCST = null;

    /**
     * Valor da BC do ICMS ST.
     * @var float
     * @dec 2
     */
    public $vBCST = 0.00;

    /**
     * Alíquota do imposto do ICMS ST.
     * (v2.0).
     * @var float
     * @dec 4
     */
    public $pICMSST = 0.00;

    /**
     * Valor do ICMS ST.
     * Valor do ICMS ST retido (v2.0).
     * @var float
     * @dec 2
     */
    public $vICMSST = 0.00;
}