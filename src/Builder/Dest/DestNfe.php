<?php namespace PhpNFe\NFe\Builder\Dest;

class DestNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Informar o CNPJ ou o CPF do destinatário, preenchendo os
     * zeros não significativos. No caso de operação com o exterior,
     * ou para comprador estrangeiro informar a tag "idEstrangeiro",
     * com o número do passaporte ou outro documento legal para
     * identificar pessoa estrangeira (campo aceita valor nulo).
     * @var string|null
     * @max 14
     */
    public $CNPJ = null;

    /**
     * Informar o CNPJ ou o CPF do destinatário, preenchendo os
     * zeros não significativos. No caso de operação com o exterior,
     * ou para comprador estrangeiro informar a tag "idEstrangeiro",
     * com o número do passaporte ou outro documento legal para
     * identificar pessoa estrangeira (campo aceita valor nulo).
     * @var string|null
     * @max 14
     */
    public $CPF = null;

    /**
     * Tag obrigatória para a NF-e (modelo 55) e opcional para a NFCe.
     * @var string|null
     * @max 20
     */
    public $idEstrangeiro = null;

    /**
     * Razão Social ou nome do destinatário.
     * Tag obrigatória para a NF-e (modelo 55) e opcional para a NFCe.
     * @var string
     * @max 60
     */
    public $xNome = '';

    /**
     * Grupo obrigatório para a NF-e (modelo 55).
     * @var EnderDestNfe
     */
    public $enderDest;

    /**
     * 1=Contribuinte ICMS (informar a IE do destinatário);
     * 2=Contribuinte isento de Inscrição no cadastro de Contribuintes
     * do ICMS;
     * 9=Não Contribuinte, que pode ou não possuir Inscrição
     * Estadual no Cadastro de Contribuintes do ICMS.
     * Nota 1: No caso de NFC-e informar indIEDest=9 e não informar
     * a tag IE do destinatário;
     * Nota 2: No caso de operação com o Exterior informar
     * indIEDest=9 e não informar a tag IE do destinatário;
     * Nota 3: No caso de Contribuinte Isento de Inscrição
     * (indIEDest=2), não informar a tag IE do destinatário.
     * @var string
     * @max 1
     */
    public $indIEDest = '';

    /**
     * Campo opcional. Informar somente os algarismos, sem os
     * caracteres de formatação (ponto, barra, hífen, etc.).
     * @var string|null
     * @max 14
     */
    public $IE = null;

    /**
     * Obrigatório, nas operações que se beneficiam de incentivos
     * fiscais existentes nas áreas sob controle da SUFRAMA. A
     * omissão desta informação impede o processamento da
     * operação pelo Sistema de Mercadoria Nacional da SUFRAMA e
     * a liberação da Declaração de Ingresso, prejudicando a
     * comprovação do ingresso / internamento da mercadoria nestas
     * áreas. (v2.0).
     * @var string|null
     * @max 9
     */
    public $ISUF = null;

    /**
     * Campo opcional, pode ser informado na NF-e conjugada, com
     * itens de produtos sujeitos ao ICMS e itens de serviços sujeitos
     * ao ISSQN.
     * @var string|null
     * @max 15
     */
    public $IM = null;

    /**
     * Campo pode ser utilizado para informar o e-mail de recepção da
     * NF-e indicada pelo destinatário (v2.0).
     * @var string|null
     * @max 60
     */
    public $email = null;

    public function __construct()
    {
        $this->enderDest = new \PhpNFe\NFe\Builder\Dest\EnderDestNfe();
    }
}