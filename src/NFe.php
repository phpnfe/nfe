<?php namespace PhpNFe\NFe;

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
use Illuminate\Filesystem\Filesystem;
use PhpNFe\NFe\Tools\AutorizaRetorno;
use PhpNFe\NFe\Tools\ConsultaRetorno;
use PhpNFe\NFe\Tools\NFEConsultaBody;
use PhpNFe\NFe\Tools\NFEConsultaHeader;
use PhpNFe\NFe\Tools\InutilizacaoRetorno;
use PhpNFe\Tools\Certificado\Certificado;

class NFe
{
    const version = 'NetForce NFe 1.2';

    /**
     * Classe de controle do certificado.
     * @var Certificado
     */
    protected $certificado;

    /**
     * @var Filesystem
     */
    protected $file;

    /**
     * NFe constructor.
     * @param Certificado $certificado
     */
    public function __construct(Certificado $certificado)
    {
        $this->certificado = $certificado;
        $this->file = new Filesystem();
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
     * Envia um xml assinado e validado para a Receita Federal para
     * ser realizada a autorização.
     *
     * @param $xml
     * @throws \Exception
     * @return AutorizaRetorno
     */
    public function autorizar($xml)
    {
        $xml = NFeXML::createByXml($xml);
        $method = Sefaz::getMethodInfo($xml->getAmbiente(), $xml->getCuf(), Sefaz::mtAutoriza);
        $header = NFEHeader::loadDOM($xml, $method->operation, $method->version, 'infNFe');
        $body = NFEBody::loadDOM($xml, $method->operation, 'enviNFe', 'infNFe');

        // Executar o comando "nfeAutorizacaoLote"
        return new AutorizaRetorno($this->soap($method, $header, $body), $xml);
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

    public function validar($xml, $versao)
    {
        $nome = $this->identificaXML($xml);
        $path = __DIR__ . '/schemes/PL_008i2/' . $nome . '_v' . $versao . '.xsd';

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

            $client = new Soap\CurlSoap($dir . '/pri.key', $dir . '/pub.key', $dir . '/cert.key');
            $resp = $client->send($method->url, $method->getNamespace(), $header, $body, $method->method);

            $xml = XML::createByXml($resp);

            $this->file->deleteDirectory($dir);

            return $xml;
        } catch (\Exception $e) {
            $this->file->deleteDirectory($dir);

            throw $e;
        }
    }

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