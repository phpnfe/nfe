<?php namespace PhpNFe\NFe\Builder\Det\Imposto\ICMS;

class ICMS51Nfe extends \PhpNFe\Tools\Builder\Builder
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
     * 8 - Nacional, mercadoria ou bem com Conteúdo de Importação.
     * @var string
     * @max 1
     */
    public $orig = '';

    /**
     * Tributação do ICMS = 51.
     * 51=Diferimento.
     * @var string
     * @max 2
     */
    public $CST = '';

    /**
     * Modalidade de determinação da BC do
     * ICMS.
     * 0=Margem Valor Agregado (%);
     * 1=Pauta (Valor);
     * 2=Preço Tabelado Máx. (valor);
     * 3=Valor da operação.
     * @var string|null
     * @max 1
     */
    public $modBC = null;

    /**
     * Percentual da Redução de BC.
     * @var float|null
     * @dec 4
     */
    public $pRedBC = null;

    /**
     * Valor da BC do ICMS.
     * @var float|null
     * @dec 2
     */
    public $vBC = null;

    /**
     * Alíquota do imposto.
     * @var float|null
     * @dec 4
     */
    public $pICMS = null;

    /**
     * Valor do ICMS da Operação.
     * Valor como se não tivesse o diferimento.
     * @var float|null
     * @dec 2
     */
    public $vICMSOp = null;

    /**
     * Percentual do diferimento.
     *  No caso de diferimento total, informar o percentual de
     * diferimento "100".
     * @var float|null
     * @dec 4
     */
    public $pDif = null;

    /**
     * Valor do ICMS diferido.
     * @var float|null
     * @dec 2
     */
    public $vICMSDif = null;

    /**
     * Valor do ICMS.
     * Informar o valor realmente devido.
     * @var float
     * @dec 2
     */
    public $vICMS = 0.00;
}