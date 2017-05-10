<?php namespace PhpNFe\NFe\DanfeCC;

use PhpNFe\Tools\XML;
use PhpNFe\NFe\Tools\NFeXML;
use Illuminate\Filesystem\Filesystem;

class DanfeCC
{
    /**
     * @var NFeXML
     */
    protected $nfeXml;

    /**
     * Usar uma imagem retangular.
     * @var
     */
    protected $logo;

    /**
     * @var Filesystem
     */
    protected $files;

    /**
     * DanfeNFe constructor.
     * @param NFeXML $nfe
     * @param bool $logo
     */
    public function __construct(NFeXML $nfe, $logo = false)
    {
        $this->files = new Filesystem();
        $this->nfeXml = $nfe;
        $this->logo = $logo;
    }

    /**
     * Gerar HTML da Danfe.
     *
     * @return string
     * @throws \Exception
     */
    public function getHTML()
    {
        ob_start();
        try {
            $evento = XML::createByXml($this->nfeXml->getElementsByTagName('infEvento')->item(0)->C14N());
            $retEvento = XML::createByXml($this->nfeXml->getElementsByTagName('infEvento')->item(1)->C14N());
            $info = $this->nfeXml->getChaveInfo('infEvento', 'ID');
            $logo = $this->getLogo();
            $barcode = $this->getBarCode($evento);
            $style = $this->files->get(__DIR__ . '/Templates/pdf.css');

            require __DIR__ . '/Templates/danfe.php';

            return ob_get_clean();
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }
    }

    /**
     * gerar PDF da Danfe.
     *
     * @param null $encoding
     * @return string
     */
    public function getPDF($encoding = null)
    {
        require_once __DIR__ . '/DomPDF/bootstrap.php';

        $html = $this->getHTML();
        $html = $this->convertEntities($html);

        $pdf = new \DOMPDF();
        $pdf->set_base_path(__DIR__);
        $pdf->load_html($html);
        $pdf->set_paper('A4', 'portrait');

        $pdf->render();

        return $pdf->output();
    }

    /**
     * Tratar caracteres especiais.
     *
     * @param $subject
     * @return string
     */
    protected function convertEntities($subject)
    {
        $entities = [
            '€' => '&#0128;',
        ];

        foreach ($entities as $search => $replace) {
            $subject = str_replace($search, $replace, $subject);
        }

        return $subject;
    }

    /**
     * Retorna a logo informada em formato image inline.
     *
     * @return null|string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function getLogo()
    {
        // Verificar se logo foi informada
        if (($this->logo === false) || (is_null($this->logo)) || ($this->logo == '')) {
            return;
        }

        // Verificar se foi informado direto o buffer
        if (@is_file($this->logo) != true) {
            return 'data:image/png;base64,' . base64_encode($this->logo);
        }

        // Verificar se arquivo da logo existe
        if ($this->files->exists($this->logo) != true) {
            return;
        }

        $ext = strtolower($this->files->extension($this->logo));
        $buffer = $this->files->get($this->logo);

        return 'data:image/' . $ext . ';base64,' . base64_encode($buffer);
    }

    /**
     * Retorna o codigo de barras em formato image inline.
     *
     * @param XML $nfe
     * @return string
     */
    protected function getBarCode(XML $nfe)
    {
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $buffer = $generator->getBarcode($nfe->getChNFeTag('infEvento', 'ID')->value(), $generator::TYPE_CODE_128_C, 1, 40);

        return 'data:image/png;base64,' . base64_encode($buffer);
    }
}