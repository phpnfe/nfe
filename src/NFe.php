<?php namespace PhpNFe\NFe;

use NFePHP\NFe\Tools;
use PhpNFe\NFe\Tools\NFeXML;
use NFePHP\Common\Certificate;
use PhpNFe\NFe\Tools\CancelaRetorno;
use PhpNFe\NFe\Tools\AutorizaRetorno;
use PhpNFe\NFe\Tools\CorrecaoRetorno;
use PhpNFe\NFe\Tools\InutilizacaoRetorno;

class NFe
{
    const version = 'NetForce NFe 1.3';

    /**
     * @var array
     */
    protected $config = [];

    /**
     * Classe de controle do certificado.
     * @var Certificate
     */
    protected $certificate;

    /**
     * @var Tools
     */
    protected $tools;

    /**
     * NFe constructor.
     * @param Certificate $certificate
     */
    public function __construct(array $config, Certificate $certificate)
    {
        $this->config = $config;
        $this->certificate = $certificate;

        $this->tools = new Tools(json_encode($this->config), $this->certificate);
        $this->tools->model('55');
    }

    /**
     * Assinar XML da NFe.
     *
     * @param $xml
     * @return string
     */
    public function signNFe($xml)
    {
        return $this->tools->signNFe($xml);
    }

    /**
     * Gerar novo id de lote.
     *
     * @return string
     */
    public function newIdLote()
    {
        return substr(str_replace(',', '', number_format(microtime(true) * 1000000, 0)), 0, 15);
    }

    /**
     * Envia um xml assinado e validado para a Receita Federal para
     * ser realizada a autorização.
     *
     * @param $xml
     * @throws \Exception
     * @return AutorizaRetorno
     */
    public function autorizar($xml)
    {
        $response = $this->tools->sefazEnviaLote([$xml], $this->newIdLote(), 1);

        $xml = NFeXML::createByXml($xml);

        return new AutorizaRetorno($response, $xml);
    }

    /**
     * Envia um evento para o cancelamento da NFe.
     *
     * @param $xml
     * @param $justificativa
     * @return CancelaRetorno
     * @throws \Exception
     */
    public function cancela($xml, $justificativa)
    {
        $nfeXml = NFeXML::createByXml($xml);
        $nProt = $nfeXml->getElementsByTagName('nProt')->item(0)->textContent;
        $chNFe = str_replace('NFe', '', $nfeXml->getElementsByTagName('infNFe')->item(0)->getAttribute('Id'));

        $response = $this->tools->sefazCancela($chNFe, $justificativa, $nProt);

        return new CancelaRetorno($this->tools, $response,  $xml);
    }

    /**
     * Envia um evento para o carta de correção da NFe.
     *
     * @param $xml
     * @param $xCorrecao
     * @param $seqEvento
     * @return CorrecaoRetorno
     * @throws \Exception
     */
    public function cartaCorrecao($xml, $xCorrecao, $seqEvento)
    {
        $nfeXml = NFeXML::createByXml($xml);
        $chNFe = str_replace('NFe', '', $nfeXml->getElementsByTagName('infNFe')->item(0)->getAttribute('Id'));

        $response = $this->tools->sefazCCe($chNFe, $xCorrecao, $seqEvento);

        return new CorrecaoRetorno($this->tools, $response,  $xml);
    }

    /**
     * Inutilizar uma faixa de numeração de nota fiscal.
     *
     * @param $serie
     * @param $nIni
     * @param $nFin
     * @param $xJust
     * @return InutilizacaoRetorno
     * @throws \Exception
     */
    public function inutiliza($serie, $nIni, $nFin, $xJust)
    {
        $response = $this->tools->sefazInutiliza($serie, $nIni, $nFin, $xJust);

        return new InutilizacaoRetorno($this->tools, $response);
    }

    /**
     * Consulta situacao da nota.
     *
     * @param $chNFe
     * @param $tpAmb
     * @return ConsultaRetorno
     */
    public function consulta($chNFe, $tpAmb)
    {
        throw new \Exception("Falta implementar com o nfephp.org...");
    }
}