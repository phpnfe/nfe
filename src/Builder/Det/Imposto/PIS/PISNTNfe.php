<?php namespace PhpNFe\NFe\Builder\Det\Imposto\PIS;

class PISNTNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Código de Situação Tributária do PIS.
     * 04=Operação Tributável (tributação monofásica (alíquota zero));
     * 05=Operação Tributável (Substituição Tributária);
     * 06=Operação Tributável (alíquota zero);
     * 07=Operação Isenta da Contribuição;
     * 08=Operação Sem Incidência da Contribuição;
     * 09=Operação com Suspensão da Contribuição;.
     * @var string
     * @max 2
     */
    public $CST = '';
}