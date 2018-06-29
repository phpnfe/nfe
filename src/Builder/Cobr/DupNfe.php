<?php namespace PhpNFe\NFe\Builder\Cobr;

class DupNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Número da Parcela.
     *
     * Obrigatória informação do número de parcelas com 3 algarismos, sequenciais e consecutivos.
     * Ex.: “001”,”002”,”003”,...
     * Observação: este padrão de preenchimento será obrigatório somente a partir de 03/09/2018
     *
     * @var string|null
     * @max 60
     */
    public $nDup = null;

    /**
     * Data de vencimento.
     *
     * Formato: “AAAA-MM-DD”.
     * Obrigatória a informação da data de vencimento na ordem crescente das datas.
     * Ex.: “2018-06-01”,”2018-07-01”, “2018-08-01”,...
     *
     * @var date|null
     */
    public $dVenc = null;

    /**
     * Valor da parcela.
     * @var float
     * @dec 2
     */
    public $vDup = 0.00;
}