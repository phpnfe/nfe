<?php namespace PhpNFe\NFe\Tools;

use PhpNFe\Tools\XML;

class NFeXML extends XML
{
    /**
     * Retorna a URL do portal da receita.
     *
     * @return string
     */
    public function getUrlPortal()
    {
        return $this->getAttribute('xmlns');
    }

    /**
     * Retorna o Código do estado autorizador.
     *
     * @return string
     */
    public function getCuf()
    {
        return $this->getElementsByTagName('cUF')->item(0)->textContent;
    }

    /**
     * @return InfoChNFe
     */
    public function getChaveInfo($tag, $prefixo)
    {
        return InfoChNFe::getIDInfo($this->getChNFeTag($tag, $prefixo));
    }

    /**
     * Retorna o ambiente da NFe.
     *
     * @return string
     * @throws \Exception
     */
    public function getAmbiente()
    {
        $amb = $this->getElementsByTagName('tpAmb')->item(0)->textContent;
        switch ($amb) {
            case '1':
                return Sefaz::ambProducao;
            case '2':
                return Sefaz::ambHomologacao;
            default:
                throw new \Exception(sprintf('Ambiente %s incorreto', $amb));
        }
    }

    public function __toString()
    {
        return $this->saveXML();
    }
}