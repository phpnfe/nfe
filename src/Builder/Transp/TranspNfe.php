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
     *
     * 0=Contratação do Frete por conta do Remetente (CIF);
     * 1=Contratação do Frete por conta do Destinatário (FOB);
     * 2=Contratação do Frete por conta de Terceiros;
     * 3=Transporte Próprio por conta do Remetente;
     * 4=Transporte Próprio por conta do Destinatário;
     * 9=Sem Ocorrência de Transporte
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