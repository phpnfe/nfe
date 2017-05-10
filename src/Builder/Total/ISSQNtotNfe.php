<?php namespace PhpNFe\NFe\Builder\Total;

/**
 * Grupo Totais referentes ao ISSQN.
 * Class ISSQNtotNfe.
 */
class ISSQNtotNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     *Valor total dos Serviços sob não-incidência
     * ou não tributados pelo ICMS.
     * @var float|null
     * @dec 2
     */
    public $vServ = null;

    /**
     * Valor total Base de Cálculo do ISS.
     * @var float|null
     * @dec 2
     */
    public $vBC = null;

    /**
     * Valor total do ISS.
     * @var float|null
     * @dec 2
     */
    public $vISS = null;

    /**
     * Valor total do PIS sobre serviços.
     * @var float|null
     * @dec 2
     */
    public $vPIS = null;

    /**
     * Valor total da COFINS sobre serviços.
     * @var float|null
     * @dec 2
     */
    public $vCOFINS = null;

    /**
     * Data da prestação do serviço.
     * @var string|null
     */
    public $dCompet = null;

    /**
     * Valor total dedução para redução da Base
     * de Cálculo.
     * @var float|null
     * @dec 2
     */
    public $vDeducao = 0.00;

    /**
     * Valor total outras retenções.
     * @var float|null
     * @dec 2
     */
    public $vOutro = null;

    /**
     * Valor total desconto incondicionado.
     * @var string|null
     * @dec 2
     */
    public $vDescIncond = null;

    /**
     * Valor total desconto condicionado.
     * @var float|null
     * @dec 2
     */
    public $vDescCond = null;

    /**
     * Valor total retenção ISS.
     * @var float|null
     * @dec 2
     */
    public $vISSRet = null;

    /**
     * Código do Regime Especial de Tributação.
     * 1=Microempresa Municipal; 2=Estimativa;
     * 3=Sociedade de Profissionais; 4=Cooperativa;
     * 5=Microempresário Individual (MEI);
     * 6=Microempresário e Empresa de Pequeno Porte (ME/EPP).
     * @var string|null
     */
    public $cRegTrib = null;
}