<?php namespace PhpNFe\NFe\Builder\Transp;

/**
 * Grupo Transportador.
 * Class TransportaNfe.
 */
class TransportaNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * CNPJ do Transportador.
     * @var string|null
     * @max 14
     */
    public $CNPJ = null;

    /**
     * CPF do Transportador.
     * @var string|null
     * @max 11
     */
    public $CPF = null;

    /**
     * Razão Social ou nome.
     * @var string|null
     * @max 60
     */
    public $xNome = null;

    /**
     * Inscrição Estadual do Transportador.]
     * nformar:
     * - Inscrição Estadual do transportador contribuinte do ICMS, sem
     * caracteres de formatação (ponto, barra, hífen, etc.);
     * - Literal “ISENTO” para transportador isento de inscrição no
     * cadastro de contribuintes ICMS;
     * - Não informar a tag para não contribuinte do ICMS,
     * A UF deve ser informada se informado uma IE. (v2.0).
     * @var string|null
     * @max 14
     */
    public $IE = null;

    /**
     * Endereço Completo.
     * @var string|null
     * @max 60
     */
    public $xEnder = null;

    /**
     * Nome do município.
     * @var string|null
     * @max 60
     */
    public $xMun = null;

    /**
     * Sigla da UF.
     * @var string|null
     * @max 2
     */
    public $UF = null;
}