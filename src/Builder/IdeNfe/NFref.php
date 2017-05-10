<?php namespace PhpNFe\NFe\Builder\IdeNfe;

use PhpNFe\Tools\Builder\Builder;

/**
 * Informação de Documentos Fiscais
 * referenciados.
 * Grupo com informações de Documentos Fiscais referenciados.
 * Informação utilizada nas hipóteses previstas na legislação. (Ex.:
 * Devolução de mercadorias, Substituição de NF cancelada,
 * Complementação de NF, etc.).
 * Class NFref.
 */
class NFref extends Builder
{
    /**
     * Chave de acesso da NF-e referenciada.
     * Referencia uma NF-e (modelo 55) emitida anteriormente,
     * vinculada a NF-e atual, ou uma NFC-e (modelo 65).
     * @var string
     * @max 44
     */
    public $refNFe = '';
}