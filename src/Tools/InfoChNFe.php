<?php namespace PhpNFe\NFe\Tools;

use Carbon\Carbon;

class InfoChNFe
{
    /**
     * Codigo da UF do emitente do Documento Fiscal.
     * @var
     */
    public $cUF;

    /**
     * Ano e Mês de emissão da NF-e.
     * @var
     */
    public $dhEmi;

    /**
     * CNPJ do emitente.
     * @var
     */
    public $cnpj;

    /**
     * Modelo do Documento Fiscal.
     * @var
     */
    public $mod;

    /**
     * Série do Documento Fiscal.
     * @var
     */
    public $serie;

    /**
     * Número do Documento Fiscal.
     * @var
     */
    public $nNF;

    /**
     * Forma de emissão da NF-e.
     * @var
     */
    public $tpEmis;

    /**
     * Código Numérico que compõe a Chave de Acesso.
     * @var
     */
    public $cNF;

    /**
     * Digito Verificador da Chave de Acesso.
     * @var
     */
    public $cDV;

    /**
     * Monta a Info com as informacoes da Chave da NFe.
     * @param $chNFe
     * @return InfoChNFe
     */
    public static function getChNFeInfo($chNFe)
    {
        $obj = new self();

        $obj->cUF = substr($chNFe, 0, 2);
        $obj->dhEmi = substr($chNFe, 2, 4);
        $obj->cnpj = substr($chNFe, 6, 14);
        $obj->mod = substr($chNFe, 20, 2);
        $obj->serie = substr($chNFe, 22, 3);
        $obj->nNF = substr($chNFe, 25, 9);
        $obj->tpEmis = substr($chNFe, 34, 1);
        $obj->cNF = substr($chNFe, 35, 8);
        $obj->cDV = substr($chNFe, 43, 1);

        // Tratar para ATOM
        $obj->dhEmi = Carbon::createFromFormat('ymd', $obj->dhEmi . '01', 'America/Sao_Paulo')->format(Carbon::ATOM);

        return $obj;
    }

    /**
     * Monta a Info com as informacoes do ID do Evento.
     * @param $id
     * @return InfoChNFe
     */
    public static function getIDInfo($id)
    {
        // Composicao ID: "ID" + tpEvento + chave da NF-e + nSeqEvento

        // Tirar o tpEvento
        $id = substr($id, 6);
        // Pegar as primeiras 44 posicoes
        $id = substr($id, 0, 44);

        return self::getChNFeInfo($id);
    }

    /**
     * Montar chave da nota fiscal.
     * @return string
     */
    public function montarChNFe($botarPrefixo = true)
    {
        // Gerar número aleatorio
        if ($this->cNF == '') {
            $this->cNF = mt_rand(10000000, 99999999);
        }

        $dt = Carbon::createFromFormat(Carbon::ATOM, $this->dhEmi, 'America/Sao_Paulo')->format('ym');

        $nNF = str_pad($this->nNF, 9, '0', STR_PAD_LEFT);

        $serie = str_pad($this->serie, 3, '0', STR_PAD_LEFT);

        // Montar os primeiros 43 caracteres
        $cNfe = $this->cUF . $dt . $this->cnpj . $this->mod . $serie . $nNF
            . $this->tpEmis . $this->cNF;

        // Calcular digito verificar
        $this->cDV = Modulo11::nfeCalculaDV($cNfe);

        if (! $botarPrefixo) {
            return $cNfe . $this->cDV;
        }

        return ('NFe' . $cNfe) . $this->cDV;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->montarChNFe();
    }
}