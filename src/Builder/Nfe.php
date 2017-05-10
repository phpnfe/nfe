<?php namespace PhpNFe\NFe\Builder;

use PhpNFe\NFe\Tools\InfoChNFe;
use PhpNFe\Tools\Builder\Builder;
use PhpNFe\Tools\Builder\Colecoes;
use PhpNFe\NFe\Builder\Cobr\CobrNfe;
use PhpNFe\NFe\Builder\Dest\DestNfe;
use PhpNFe\NFe\Builder\Emit\EmitNfe;
use PhpNFe\NFe\Builder\IdeNfe\IdeNfe;
use PhpNFe\NFe\Builder\Total\TotalNfe;
use PhpNFe\NFe\Builder\Transp\TranspNfe;
use PhpNFe\Tools\Builder\PropriedadeNull;

class Nfe extends Builder
{
    const Versao = '3.10';

    /**
     * Informações de identificação da NF-e.
     * @var IdeNFe
     */
    public $ide;

    /**
     * Identificação do emitente da NF-e.
     * @var EmitNfe
     */
    public $emit;

    /**
     * Identificação do Destinatário da NF-e.
     * Grupo obrigatório para a NF-e (modelo 55).
     * @var DestNfe
     */
    public $dest;

    /**
     * Detalhamento de Produtos e Serviços.
     * Múltiplas ocorrências (máximo = 990).
     * @var Colecoes
     */
    public $det;

    /**
     * Grupo Totais da NF-e.
     * O grupo de valores totais da NF-e deve ser informado com o
     * somatório do campo correspondente dos itens.
     * @var TotalNfe
     */
    public $total;

    /**
     * Grupo Informações do Transporte.
     * @var TranspNfe
     */
    public $transp;

    /**
     * Grupo Cobrança.
     * @var CobrNfe
     */
    public $cobr;

    /**
     * Grupo de Informações Adicionais.
     * @var InfAdic\InfAdicNfe
     */
    public $infAdic;

    /**
     * NFe constructor.
     */
    public function __construct()
    {
        $this->ide = new IdeNfe();
        $this->emit = new EmitNfe();
        $this->dest = new DestNfe();
        $this->det = new Colecoes([], 'nItem');
        $this->total = new TotalNfe();
        $this->transp = new TranspNfe();
        $this->cobr = new PropriedadeNull('\PhpNFe\NFe\Builder\Cobr\CobrNfe');
        $this->infAdic = new PropriedadeNull('\PhpNFe\NFe\Builder\InfAdic\InfAdicNfe');
    }

    /**
     * Monta a chave de acesso.
     * @return string
     */
    protected function getID()
    {
        $chave = new InfoChNFe();
        $chave->cUF = $this->ide->cUF;
        $chave->dhEmi = $this->ide->dhEmi;
        $chave->cnpj = $this->emit->CNPJ;
        $chave->mod = $this->ide->mod;
        $chave->serie = $this->ide->serie;
        $chave->nNF = $this->ide->nNF;
        $chave->tpEmis = $this->ide->tpEmis;
        $chave->cNF = $this->ide->cNF;

        $chNFe = $chave->montarChNFe();

        // Setando o numero gerado e o codigo verificador gerado.
        $this->ide->cNF = $chave->cNF;
        $this->ide->cDV = $chave->cDV;

        return $chNFe;
    }

    /**
     * @return string
     */
    public function getXML()
    {
        // Se for HOMOLOGACAO, forçar razão social padrão
        if ($this->ide->tpAmb == '2') {
            $this->dest->xNome = 'NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL';
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<NFe xmlns="http://www.portalfiscal.inf.br/nfe">';
        $xml .= '<infNFe versao="' . self::Versao . '" Id="' . $this->getID() . '">';

        $xml .= $this->geraXmlPropriedades();

        $xml .= '</infNFe>';
        $xml .= '</NFe>';

        return $xml;
    }

    /**
     * @param $arquivo
     */
    public function salvaXML($arquivo)
    {
        file_put_contents($arquivo, $this->getXML());
    }
}