<?php namespace PhpNFe\NFe\Builder\Det\Imposto\ICMS;

/**
 * Informações do ICMS da Operação própria
 * e ST.
 * Informar apenas um dos grupos de tributação do ICMS
 * (ICMS00, ICMS10, ...) (v2.0).
 * Class ICMSNfe.
 */
class ICMSNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Grupo Tributação do ICMS= 00.
     * Tributada integralmente.
     * @var ICMS00Nfe
     */
    public $ICMS00;

    /**
     * Grupo Tributação do ICMS = 10.
     * Tributada e com cobrança do ICMS por substituição tributária.
     * @var ICMS10Nfe
     */
    public $ICMS10;

    /**
     * Grupo Tributação do ICMS = 20.
     * Tributação com redução de base de cálculo.
     * @var ICMS20Nfe
     */
    public $ICMS20;

    /**
     * Grupo Tributação do ICMS = 30.
     * Tributação Isenta ou não tributada e com cobrança do ICMS por
     * substituição tributária.
     * @var ICMS30Nfe
     */
    public $ICMS30;

    /**
     * Grupo Tributação ICMS = 40, 41, 50.
     * Tributação Isenta, Não tributada ou Suspensão.
     * @var ICMS40Nfe
     */
    public $ICMS40;

    /**
     * Grupo Tributação do ICMS = 51.
     * Tributação com Diferimento (a exigência do preenchimento das
     * informações do ICMS diferido fica a critério de cada UF).
     * @var ICMS51Nfe
     */
    public $ICMS51;

    /**
     * Grupo Tributação do ICMS = 60.
     * Tributação ICMS cobrado anteriormente por substituição
     * tributária.
     * @var ICMS60Nfe
     */
    public $ICMS60;

    /**
     * Grupo Tributação do ICMS = 70.
     * Tributação ICMS com redução de base de cálculo e cobrança
     * do ICMS por substituição tributária.
     * @var ICMS70Nfe
     */
    public $ICMS70;

    /**
     * Grupo Tributação do ICMS = 90.
     * Tributação ICMS: Outros.
     * @var ICMS90Nfe
     */
    public $ICMS90;

    /**
     * Grupo de Partilha do ICMS entre a UF de
     * origem e UF de destino ou a UF definida
     * na legislação.
     * Operação interestadual para consumidor final com partilha do
     * ICMS devido na operação entre a UF de origem e a do
     * destinatário, ou a UF definida na legislação. (Ex. UF da
     * concessionária de entrega do veículo) (v2.0).
     * @var ICMSPartNfe
     */
    public $ICMSPart;

    /**
     * Grupo de Repasse de ICMS ST retido
     * anteriormente em operações interestaduais
     * com repasses através do Substituto
     * Tributário.
     * @var ICMSSTNfe
     */
    public $ICMSST;

    /**
     * Grupo CRT=1 – Simples Nacional e
     * CSOSN=101.
     * Tributação ICMS pelo Simples Nacional, CSOSN=101 (v2.0).
     * @var ICMSSN101Nfe
     */
    public $ICMSSN101;

    /**
     * Grupo CRT=1 – Simples Nacional e
     * CSOSN=102, 103, 300 ou 400.
     * Tributação ICMS pelo Simples Nacional, CSOSN=102, 103, 300
     * ou 400 (v2.0).
     * @var ICMSSN102Nfe
     */
    public $ICMSSN102;

    /**
     * Grupo CRT=1 – Simples Nacional e
     * CSOSN=201.
     * Tributação ICMS pelo Simples Nacional, CSOSN=201 (v2.0).
     * @var ICMSSN201Nfe
     */
    public $ICMSSN201;

    /**
     * Grupo CRT=1 – Simples Nacional e
     * CSOSN=202 ou 203.
     * Tributação ICMS pelo Simples Nacional, CSOSN=202 ou 203
     * (v2.0).
     * @var ICMSSN202Nfe
     */
    public $ICMSSN202;

    /**
     * Grupo CRT=1 – Simples Nacional e
     * CSOSN = 500.
     * Tributação ICMS pelo Simples Nacional, CSOSN=500 (v2.0).
     * @var ICMSSN500Nfe
     */
    public $ICMSSN500;

    /**
     * Grupo CRT=1 – Simples Nacional e
     * CSOSN=900.
     * Tributação ICMS pelo Simples Nacional, CSOSN=900 (v2.0).
     * @var ICMSSN900Nfe
     */
    public $ICMSSN900;

    /**
     * ICMSNfe constructor.
     */
    public function __construct()
    {
        $this->ICMS00 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMS00Nfe');
        $this->ICMS10 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMS10Nfe');
        $this->ICMS20 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMS20Nfe');
        $this->ICMS30 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMS30Nfe');
        $this->ICMS40 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMS40Nfe');
        $this->ICMS51 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMS51Nfe');
        $this->ICMS60 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMS60Nfe');
        $this->ICMS70 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMS70Nfe');
        $this->ICMS90 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMS90Nfe');
        $this->ICMSPart = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMSPartNfe');
        $this->ICMSST = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMSSTNfe');
        $this->ICMSSN101 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMSSN101Nfe');
        $this->ICMSSN102 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMSSN102Nfe');
        $this->ICMSSN201 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMSSN201Nfe');
        $this->ICMSSN202 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMSSN202Nfe');
        $this->ICMSSN500 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMSSN500Nfe');
        $this->ICMSSN900 = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\ICMS\ICMSSN900Nfe');
    }
}