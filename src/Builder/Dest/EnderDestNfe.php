<?php namespace PhpNFe\NFe\Builder\Dest;

class EnderDestNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Logradouro.
     * @var string
     * @max 60
     */
    public $xLgr = '';

    /**
     * Número.
     * @var string
     * @max 60
     */
    public $nro = '';

    /**
     * Complemento.
     * @var string|null
     * @max 60
     */
    public $xCpl = null;

    /**
     * Bairro.
     * @var string
     * @max 60
     */
    public $xBairro = '';

    /**
     * Utilizar a Tabela do IBGE (Anexo IX - Tabela de UF, Município e
     * País).
     * Informar ‘9999999 ‘para operações com o exterior.
     * @var string
     * @max 7
     */
    public $cMun = '';

    /**
     * Informar ‘EXTERIOR ‘para operações com o exterior.
     * @var string
     * @max 60
     */
    public $xMun = '';

    /**
     * Sigla da UF.
     * @var string
     * @max 2
     */
    public $UF = '';

    /**
     * Código do CEP.
     * Informar os zeros não significativos.
     * @var string|null
     * @max 8
     */
    public $CEP = null;

    /**
     * Utilizar a Tabela do BACEN (Anexo IX - Tabela de UF,
     * Município e País).
     * @var string|null
     * @max 4
     */
    public $cPais = null;

    /**
     * Nome do País.
     * @var string|null
     * @max 60
     */
    public $xPais = null;

    /**
     * Preencher com o Código DDD + número do telefone. Nas
     * operações com exterior é permitido informar o código do país +
     * código da localidade + número do telefone (v2.0).
     * @var string|null
     * @max 14
     */
    public $fone = null;
}