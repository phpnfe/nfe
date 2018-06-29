<?php namespace PhpNFe\NFe\Tools;

abstract class Retorno
{
    /**
     * Object response.
     *
     * @var object
     */
    protected $response;

    /**
     * @param $key
     * @param null $default
     * @return null|object
     */
    protected function getValue($key, $default = null)
    {
        $value = $this->response;
        $parts = explode('.', $key);

        foreach ($parts as $part) {
            if (isset($value->{$part})) {
                $value = $value->{$part};
            } else {
                return $default;
            }
        }

        return $value;
    }

    /**
     * Retorna o código do retorno.
     *
     * @return string
     */
    abstract public function getCode();

    /**
     * Retorna a mensagem do retorno.
     *
     * @return string
     */
    abstract public function getMessage();

    /**
     * Retorna a chave da NFe.
     *
     * @return string
     */
    abstract public function getChNFe();

    /**
     * Verifrica se o retorno é um erro.
     *
     * @return bool
     */
    abstract public function isError();

    /**
     * Retorna o XML protocolado quando OK.
     *
     * @return string
     */
    abstract public function getXML();

    /**
     * Salvar o arquivo xml protocolado.
     *
     * @param $arquivo
     */
    public function salvaXML($arquivo)
    {
        $code = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . $this->getXML();
        file_put_contents($arquivo, $code);
    }
}