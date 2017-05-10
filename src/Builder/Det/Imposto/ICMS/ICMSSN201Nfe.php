<?php namespace PhpNFe\NFe\Builder\Det\Imposto\ICMS;

class ICMSSN201Nfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Origem da mercadoria.
     * 0 - Nacional, exceto as indicadas nos códigos 3, 4, 5 e 8;
     * 1 - Estrangeira - Importação direta, exceto a indicada no código
     * 6;
     * 2 - Estrangeira - Adquirida no mercado interno, exceto a
     * indicada no código 7;.
     * @var string
     * @max 1
     */
    public $orig = '';

    /**
     * Código de Situação da Operação –
     * Simples Nacional.
     * 201=Tributada pelo Simples Nacional com permissão de crédito
     * e com cobrança do ICMS por Substituição Tributária (v2.0).
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
     * (v2.0).
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

    /**
     * Alíquota aplicável de cálculo do crédito
     * (SIMPLES NACIONAL).
     * (v2.0).
     * @var float
     * @dec 4
     */
    public $pCredSN = 0.00;

    /**
     * Valor crédito do ICMS que pode ser
     * aproveitado nos termos do art. 23 da LC
     * 123 (SIMPLES NACIONAL).
     * (v2.0).
     * @var float
     * @dec 2
     */
    public $vCredICMSSN = 0.00;
}