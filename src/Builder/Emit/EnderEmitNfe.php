<?php namespace PhpNFe\NFe\Builder\Emit;

class EnderEmitNfe extends \PhpNFe\Tools\Builder\Builder
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
     * Código do município.
     * Utilizar a Tabela do IBGE (Anexo IX- Tabela de UF, Município e
     * País).
     * @var string
     * @max 7
     */
    public $cMun = '';

    /**
     * Nome do município.
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
     * Código do CEP
     * Informar os zeros não significativos. (NT 2011/004).
     * @var string
     * @max 8
     */
    public $CEP = '';

    /**
     * Código do País.
     * 1058=Brasil.
     * @var string|null
     * @max 4
     */
    public $cPais = null;

    /**
     * Nome do País.
     * Brasil ou BRASIL.
     * @var string|null
     * @max 60
     */
    public $xPais = null;

    /**
     * Telefone.
     * Preencher com o Código DDD + número do telefone. Nas
     * operações com exterior é permitido informar o código do país +
     * código da localidade + número do telefone (v2.0).
     * @var string|null
     * @max 14
     */
    public $fone = null;
}