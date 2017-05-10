<?php namespace PhpNFe\NFe\Tools;

class NFEConsultaBody
{
    /**
     * Mensagem do Consulta.
     * @var
     */
    protected $mensagem;

    /**
     * NFEConsultaBody constructor.
     * @param $mensagem
     */
    public function __construct($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * @param $mensagem
     * @return NFEConsultaBody
     */
    public static function loadDOM($mensagem)
    {
        return new self($mensagem);
    }

    /**
     * @return mixed|string
     */
    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeConsultaBody.xml');
        $xml = str_replace('{{mensagem}}', $this->mensagem, $xml);

        return $xml;
    }
}