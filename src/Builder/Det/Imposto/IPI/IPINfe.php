<?php namespace PhpNFe\NFe\Builder\Det\Imposto\IPI;

use PhpNFe\Tools\Builder\PropriedadeNull;

/**
 * Informar apenas quando o item for sujeito ao IPI.
 * Class IPINfe.
 */
class IPINfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Classe de enquadramento do IPI para
     * Cigarros e Bebidas.
     * Preenchimento conforme Atos Normativos editados pela
     * Receita Federal (Observação 2).
     * @var null
     * @max 5
     */
    public $clEnq;

    /**
     * CNPJ do produtor da mercadoria, quando
     * diferente do emitente. Somente para os
     * casos de exportação direta ou indireta.
     * Informar os zeros não significativos.
     * @var null
     * @max 14
     */
    public $CNPJProd;

    /**
     * Código do selo de controle IPI.
     * Preenchimento conforme Atos Normativos editados pela
     * Receita Federal (Observação 3).
     * @var null
     * @max 60
     */
    public $cSelo;

    /**
     * Quantidade de selo de controle.
     * @var null
     * @max 12
     */
    public $qSelo;

    /**
     * Código de Enquadramento Legal do IPI.
     * Tabela a ser criada pela RFB, informar 999 enquanto a tabela
     * não for criada.
     * @var string
     * @max 3
     */
    public $cEnq = '';

    /**
     * Grupo do CST 00, 49, 50 e 99
     * Informar apenas um dos grupos O07 ou O08 com base valor
     * atribuído ao campo O09 – CST do IPI.
     * @var IPITribNfe
     */
    public $IPITrib;

    /**
     * Grupo CST 01, 02, 03, 04, 51, 52, 53, 54 e
     * 55.
     * @var IPINTNfe
     */
    public $IPINT;

    public function __construct()
    {
        $this->IPITrib = new PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\IPI\IPITribNfe');
        $this->IPINT = new PropriedadeNull('\PhpNFe\NFe\Builder\Det\Imposto\IPI\IPINTNfe');
    }
}