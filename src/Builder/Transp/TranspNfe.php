<?php namespace PhpNFe\NFe\Builder\Transp;

use PhpNFe\NFe\Builder\Transp\Vol\VolNfe;

/**
 * Grupo Informações do Transporte.
 * Class TranspNfe.
 */
class TranspNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Modalidade do frete.
     * 0=Por conta do emitente;
     * 1=Por conta do destinatário/remetente;
     * 2=Por conta de terceiros;
     * 9=Sem frete. (V2.0).
     * @var string
     * @max 1
     */
    public $modFrete = '';

    /**
     * Grupo Transportador.
     * @var TransportaNfe
     */
    public $transporta;

    /**
     * Grupo Volumes.
     * (NT 2012/003).
     * @var VolNfe
     */
    public $vol;

    /**
     * TranspNfe constructor.
     */
    public function __construct()
    {
        $this->transporta = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Transp\TransportaNfe');
        $this->vol = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\NFe\Builder\Transp\Vol\VolNfe');
    }
}