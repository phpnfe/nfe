<?php namespace PhpNFe\NFe;

use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;

use DOMDocument;
use PhpNFe\Tools\XML;
use PhpNFe\Tools\Soap;
use PhpNFe\Tools\Validar;
use PhpNFe\NFe\Tools\Sefaz;
use PhpNFe\NFe\Tools\EvBody;
use PhpNFe\NFe\Tools\NFeXML;
use PhpNFe\NFe\Tools\NFEBody;
use PhpNFe\NFe\Tools\AjustaXML;
use PhpNFe\NFe\Tools\EvCCDados;
use PhpNFe\NFe\Tools\InfoChNFe;
use PhpNFe\NFe\Tools\NFEHeader;
use PhpNFe\NFe\Tools\InutHeader;
use PhpNFe\NFe\Tools\MethodSefaz;
use PhpNFe\NFe\Tools\NFeInutBody;
use PhpNFe\NFe\Tools\NFeInutDados;
use PhpNFe\NFe\Tools\EventoRetorno;
use PhpNFe\NFe\Tools\EvCancelaDados;
use PhpNFe\NFe\Tools\NFEConsultaMsg;
use PhpNFe\NFe\Tools\AutorizaRetorno;
use PhpNFe\NFe\Tools\ConsultaRetorno;
use PhpNFe\NFe\Tools\NFEConsultaBody;
use PhpNFe\NFe\Tools\NFEConsultaHeader;
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
     * @param $seqEvento
     * @return EventoRetorno
     * @throws \Exception
     */
    public function cancela($xml, $justificativa, $seqEvento)
    {
        $xml = NFeXML::createByXml($xml);
        $method = Sefaz::getMethodInfo($xml->getAmbiente(), $xml->getCuf(), Sefaz::mtCancela);
        $mensagem = EvCancelaDados::loadDOM($xml, $justificativa, $seqEvento);
        $signedMsg = AjustaXML::limpaXml($this->certificado->assinarXML($mensagem, 'infEvento'));
        $header = NFEHeader::loadDOM($xml, $method->operation, $method->version, 'infEvento');
        $body = EvBody::loadDOM(XML::createByXml($signedMsg), $method->operation, 'enviNFe', 'infEvento');

        return new EventoRetorno($this->soap($method, $header, $body), NFeXML::createByXml($signedMsg));
    }

    /**
     * Envia um evento para o carta de correção da NFe.
     *
     * @param $xml
     * @param $xCorrecao
     * @param $seqEvento
     * @return EventoRetorno
     * @throws \Exception
     */
    public function cartaCorrecao($xml, $xCorrecao, $seqEvento)
    {
        $xml = NFeXML::createByXml($xml);
        $method = Sefaz::getMethodInfo($xml->getAmbiente(), $xml->getCuf(), Sefaz::mtCartaCorrecao);
        $mensagem = EvCCDados::loadDOM($xml, $xCorrecao, $seqEvento);
        $signedMsg = AjustaXML::limpaXml($this->certificado->assinarXML($mensagem, 'infEvento'));
        $header = NFEHeader::loadDOM($xml, $method->operation, $method->version, 'infEvento');
        $body = EvBody::loadDOM(XML::createByXml($signedMsg), $method->operation, 'enviNFe', 'infEvento');

        return new EventoRetorno($this->soap($method, $header, $body), NFeXML::createByXml($signedMsg));
    }

    /**
     * Inutilizar uma faixa de numeração de nota fiscal.
     *
     * @param $sAno
     * @param $cnpj
     * @param $serie
     * @param $nIni
     * @param $nFin
     * @param $tpAmb
     * @param $cUF
     * @param $xJust
     * @return InutilizacaoRetorno
     * @throws \Exception
     */
    public function inutiliza($sAno, $cnpj, $serie, $nIni, $nFin, $tpAmb, $cUF, $xJust)
    {
        $method = Sefaz::getMethodInfo($tpAmb, $cUF, Sefaz::mtInutilizacao);
        $mensagem = NFeInutDados::loadDOM($sAno, $cnpj, $serie, $nIni, $nFin, $xJust, $method);
        $signedMsg = AjustaXML::limpaXml($this->certificado->assinarXML($mensagem, 'infInut'));
        $header = InutHeader::loadDOM($cUF, $method->version);
        $body = NFeInutBody::loadDOM(XML::createByXml($signedMsg));

        // Validar schema XML
        $this->validar($signedMsg, $method->version);

        return new InutilizacaoRetorno($this->soap($method, $header, $body));
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
        $info = InfoChNFe::getChNFeInfo($chNFe);
        $method = Sefaz::getMethodInfo(Sefaz::getAmbiente($tpAmb), $info->cUF, Sefaz::mtConsulta);
        $mensagem = NFEConsultaMsg::loadDOM($tpAmb, $chNFe);
        $header = NFEConsultaHeader::loadDOM($info->cUF, $method->version);
        $body = NFEConsultaBody::loadDOM($mensagem);

        $this->validar($mensagem, $method->version);

        return new ConsultaRetorno($this->soap($method, $header, $body));
    }

    /**
     * Valida xml pelo schema.
     *
     * @param $xml
     * @param $versao
     * @return bool
     */
    public function validar($xml, $versao)
    {
        $nome = $this->identificaXML($xml);
        $path = __DIR__ . '/schemes/' . $this->schemaVersion . '/' . $nome . '_v' . $versao . '.xsd';

        return Validar::validar($xml, $path);
    }

    /**
     * Fazer requisição SOAP.
     *
     * @param MethodSefaz $method
     * @param $header
     * @param $body
     * @return DOMDocument
     * @throws \Exception
     */
    protected function soap(MethodSefaz $method, $header, $body)
    {
        $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid();
        try {
            // Criar diretorio temporario.
            $this->file->makeDirectory($dir);

            // Salvar certificados na pasta temp criada.
            $this->certificado->salvaChave($dir);

            $client = new Soap\CurlSoap($dir . '/pri.key', $dir . '/pub.key', $dir . '/cert.key', 10, 6);
            $resp = $client->send($method->url, $method->getNamespace(), $header, $body, $method->method);

            $xml = XML::createByXml($resp);

            $this->file->deleteDirectory($dir);

            return $xml;
        } catch (\Exception $e) {
            $this->file->deleteDirectory($dir);

            throw $e;
        }
    }

    /**
     * Gera id xml.
     *
     * @param $xml
     * @return string
     */
    private function identificaXML($xml)
    {
        switch (true) {
            case stristr($xml, 'infNFe'):
                return 'nfe';
            case stristr($xml, 'infInut'):
                return 'inutNFe';
            case stristr($xml, 'consSitNFe'):
                return 'consSitNFe';
            default:
                return '';
        }
    }
}