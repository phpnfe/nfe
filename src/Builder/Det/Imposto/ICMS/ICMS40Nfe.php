<?php namespace PhpNFe\NFe\Builder\Det\Imposto\ICMS;

class ICMS40Nfe extends \PhpNFe\Tools\Builder\Builder
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
     * Tributação do ICMS = 40, 41 ou 50
     * 40=Isenta;
     * 41=Não tributada;
     * 50=Suspensão.
     * @var string
     * @max 2
     */
    public $CST = '';

    /**
     * Valor do ICMS.
     * Informar apenas nas operações:
     * a) com produtos beneficiados com a desoneração condicional
     * do ICMS.
     * b) destinadas à SUFRAMA, informando-se o valor que seria
     * devido se não houvesse isenção.
     * c) de venda a órgão da administração pública direta e suas
     * fundações e autarquias com isenção do ICMS. (NT 2011/004).
     * @var float
     * @dec 2
     */
    public $vICMSDeson = null;

    /**
     * Motivo da desoneração do ICMS.
     * Campo será preenchido quando o campo anterior estiver
     * preenchido. Informar o motivo da desoneração:
     * 1=Táxi;
     * 3=Produtor Agropecuário;
     * 4=Frotista/Locadora;
     * 5=Diplomático/Consular;
     * 6=Utilitários e Motocicletas da Amazônia Ocidental e Áreas de
     * Livre Comércio (Resolução 714/88 e 790/94 – CONTRAN e
     * suas alterações);
     * 7=SUFRAMA;
     * 8=Venda a Órgão Público;
     * 9=Outros. (NT 2011/004);
     * 10=Deficiente Condutor (Convênio ICMS 38/12);
     * 11=Deficiente Não Condutor (Convênio ICMS 38/12).
     * Revogada a partir da versão 3.01 a possibilidade de usar o
     * motivo 2=Deficiente Físico.
     * @var string
     * @max 2
     */
    public $motDesICMS = null;
}