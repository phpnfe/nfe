<?php namespace PhpNFe\NFe\Builder\Det\Imposto\COFINS;

class COFINSOutrNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Código de Situação Tributária da COFINS
     * 49=Outras Operações de Saída;
     * 50=Operação com Direito a Crédito - Vinculada Exclusivamente
     * a Receita Tributada no Mercado Interno;
     * 51=Operação com Direito a Crédito - Vinculada Exclusivamente
     * a Receita Não Tributada no Mercado Interno;
     * 52=Operação com Direito a Crédito – Vinculada Exclusivamente
     * a Receita de Exportação;
     * 53=Operação com Direito a Crédito - Vinculada a Receitas
     * Tributadas e Não-Tributadas no Mercado Interno;
     * 54=Operação com Direito a Crédito - Vinculada a Receitas
     * Tributadas no Mercado Interno e de Exportação;
     * 55=Operação com Direito a Crédito - Vinculada a Receitas NãoTributadas
     * no Mercado Interno e de Exportação;
     * 56=Operação com Direito a Crédito - Vinculada a Receitas
     * Tributadas e Não-Tributadas no Mercado Interno, e de
     * Exportação;
     * 60=Crédito Presumido - Operação de Aquisição Vinculada
     * Exclusivamente a Receita Tributada no Mercado Interno;
     * 61=Crédito Presumido - Operação de Aquisição Vinculada
     * Exclusivamente a Receita Não-Tributada no Mercado Interno;
     * 62=Crédito Presumido - Operação de Aquisição Vinculada
     * Exclusivamente a Receita de Exportação;
     * 63=Crédito Presumido - Operação de Aquisição Vinculada a
     * Receitas Tributadas e Não-Tributadas no Mercado Interno;
     * 64=Crédito Presumido - Operação de Aquisição Vinculada a
     * Receitas Tributadas no Mercado Interno e de Exportação;
     * 65=Crédito Presumido - Operação de Aquisição Vinculada a
     * Receitas Não-Tributadas no Mercado Interno e de Exportação;
     * 66=Crédito Presumido - Operação de Aquisição Vinculada a
     * Receitas Tributadas e Não-Tributadas no Mercado Interno, e de
     * Exportação;
     * 67=Crédito Presumido - Outras Operações;
     * 70=Operação de Aquisição sem Direito a Crédito;
     * 71=Operação de Aquisição com Isenção;
     * 72=Operação de Aquisição com Suspensão;
     * 73=Operação de Aquisição a Alíquota Zero;
     * 74=Operação de Aquisição; sem Incidência da Contribuição;
     * 75=Operação de Aquisição por Substituição Tributária;
     * 98=Outras Operações de Entrada;
     * 99=Outras Operações;.
     * @var string
     * @max 2
     */
    public $CST = '';

    /**
     * Valor da Base de Cálculo da COFINS.
     * Informar os campos S07 e S08 para cálculo da COFINS em
     * percentual.
     * @var float
     * @dec 2
     */
    public $vBC = 0.00;

    /**
     * Alíquota da COFINS (em percentual).
     * @var float|null
     * @dec 4
     */
    public $pCOFINS = null;

    /**
     * Quantidade Vendida.
     * @var float|null
     * @dec 4
     */
    public $qBCProd = null;

    /**
     * Alíquota da COFINS (em reais).
     * @var float|null
     * @dec 4
     */
    public $vAliqProd = null;

    /**
     * Valor da COFINS.
     * @var float
     * @dec 2
     */
    public $vCOFINS = 0.00;
}