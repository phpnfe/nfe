<?php namespace PhpNFe\NFe\Tools;

use Illuminate\Support\Arr;

class MethodSefaz
{
    public $cuf = '';
    public $amb = '';
    public $method = '';
    public $operation = '';
    public $version = '';
    public $url = '';

    public function __construct(array $info)
    {
        $this->cuf = Arr::get($info, 'cuf');
        $this->amb = Arr::get($info, 'amb');
        $this->method = Arr::get($info, 'method');
        $this->operation = Arr::get($info, 'op');
        $this->version = Arr::get($info, 'versao');
        $this->url = Arr::get($info, 'url');
    }

    /**
     * Retorna a URL do NameSpace.
     *
     * @return string
     */
    public function getNamespace()
    {
        return sprintf('%s/wsdl/%s', Sefaz::urlPortal, $this->operation);
    }
}