<?php namespace PhpNFe\NFe\Builder\Emit;

class EmitNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Informar o CNPJ do emitente. Na emissão de NF-e avulsa pelo
     * Fisco, as informações do remetente serão informadas neste
     * grupo. O CNPJ ou CPF deverão ser informados com os zeros
     * não significativos.
     * @var string|null
     * @max 14
     */
    public $CNPJ = null;

    /**
     * Informar o CNPJ do emitente. Na emissão de NF-e avulsa pelo
     * Fisco, as informações do remetente serão informadas neste
     * grupo. O CNPJ ou CPF deverão ser informados com os zeros
     * não significativos.
     * @var string|null
     * @max 11
     */
    public $CPF = null;

    /**
     * Razão Social ou Nome do emitente.
     * @var string
     * @max 60
     */
    public $xNome = '';

    /**
     * Nome fantasia.
     * @var string|null
     * @max 60
     */
    public $xFant = null;

    /**
     * Endereço do emitente.
     * @var EnderEmitNfe
     */
    public $enderEmit;

    /**
     * Inscrição Estadual do Emitente.
     * Informar somente os algarismos, sem os caracteres de
     * formatação (ponto, barra, hífen, etc.).
     * Na emissão de NF-e Avulsa pode ser informado o literal
     * “ISENTO” para os contribuintes do ICMS isentos de inscrição no
     * Cadastro de Contribuintes de ICMS.
     * @var string
     * @max 14
     */
    public $IE = '';

    /**
     * IE do Substituto Tributário.
     * IE do Substituto Tributário da UF de destino da mercadoria,
     * quando houver a retenção do ICMS ST para a UF de destino.
     * @var string|null
     * @max 14
     */
    public $IEST = null;

    /**
     * Inscrição Municipal do Prestador de
     * Serviço.
     * Informado na emissão de NF-e conjugada, com itens de
     * produtos sujeitos ao ICMS e itens de serviços sujeitos ao
     * ISSQN.
     * @var string|null
     * @max 15
     */
    public $IM = null;

    /**
     * CNAE fiscal.
     * Campo Opcional. Pode ser informado quando a Inscrição
     * Municipal (id:C19) for informada.
     * @var string|null
     * @max 7
     */
    public $CNAE = null;

    /**
     * Código de Regime Tributário.
     * 1=Simples Nacional;
     * 2=Simples Nacional, excesso sublimite de receita bruta;
     * 3=Regime Normal. (v2.0).
     * @var string
     * @max 1
     */
    public $CRT = '';

    public function __construct()
    {
        $this->enderEmit = new EnderEmitNfe();
    }
}