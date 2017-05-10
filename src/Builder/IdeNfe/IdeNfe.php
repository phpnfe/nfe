<?php namespace PhpNFe\NFe\Builder\IdeNfe;

use PhpNFe\NFe\NFe as BaseNFe;
use PhpNFe\Tools\Builder\Builder;
use PhpNFe\Tools\Builder\PropriedadeNull;

class IdeNfe extends Builder
{
    /**
     * Código da UF do emitente do Documento Fiscal. Utilizar a
     * Tabela do IBGE de código de unidades da federação (Anexo IX
     * - Tabela de UF, Município e País).
     * @var string
     * @max 2
     */
    public $cUF = '';

    /**
     * Código numérico que compõe a Chave de Acesso. Número
     * aleatório gerado pelo emitente para cada NF-e para evitar
     * acessos indevidos da NF-e. (v2.0).
     * @var string
     * @max 8
     */
    public $cNF = '';

    /**
     * Informar a natureza da operação de que decorrer a saída ou a
     * entrada, tais como: venda, compra, transferência, devolução,
     * importação, consignação, remessa (para fins de demonstração,
     * de industrialização ou outra), conforme previsto na alínea 'i',
     * inciso I, art. 19 do CONVÊNIO S/Nº, de 15 de dezembro de
     * 1970.
     * @var string
     * @max 60
     */
    public $natOp = '';

    /**
     * 0=Pagamento à vista;
     * 1=Pagamento a prazo;
     * 2=Outros.
     * @var string
     * @max 1
     */
    public $indPag = '';

    /**
     * 55=NF-e emitida em substituição ao modelo 1 ou 1A;
     * 65=NFC-e, utilizada nas operações de venda no varejo (a
     * critério da UF aceitar este modelo de documento).
     * @var string
     * @max 2
     */
    public $mod = '55';

    /**
     * Série do Documento Fiscal, preencher com zeros na hipótese
     * de a NF-e não possuir série. (v2.0)
     * Série 890-899: uso exclusivo para emissão de NF-e avulsa, pelo
     * contribuinte com seu certificado digital, através do site do Fisco
     * (procEmi=2). (v2.0)
     * Serie 900-999: uso exclusivo de NF-e emitidas no SCAN. (v2.0).
     * @var string
     * @max 3
     */
    public $serie = '';

    /**
     * Número do Documento Fiscal.
     * @var string
     * @max 9
     */
    public $nNF = '';

    /**
     * Data e hora no formato UTC (Universal Coordinated Time):
     * AAAA-MM-DDThh:mm:ssTZD.
     * @var \DateTime
     */
    public $dhEmi = '';

    /**
     * Data e hora no formato UTC (Universal Coordinated Time):
     * AAAA-MM-DDThh:mm:ssTZD.
     * Não informar este campo para a NFC-e.
     * @var \DateTime|null
     */
    public $dhSaiEnt = null;

    /**
     * 0=Entrada;
     * 1=Saída.
     * @var string
     */
    public $tpNF = '1';

    /**
     * 1=Operação interna;
     * 2=Operação interestadual;
     * 3=Operação com exterior.
     * @var string
     * @max 1
     */
    public $idDest = '1';

    /**
     * Informar o município de ocorrência do fato gerador do ICMS.
     * Utilizar a Tabela do IBGE (Anexo IX - Tabela de UF, Município e
     * País).
     * @var string
     * @max 7
     */
    public $cMunFG = '';

    /**
     * 0=Sem geração de DANFE;
     * 1=DANFE normal, Retrato;
     * 2=DANFE normal, Paisagem;
     * 3=DANFE Simplificado;
     * 4=DANFE NFC-e;
     * 5=DANFE NFC-e em mensagem eletrônica (o envio de
     * mensagem eletrônica pode ser feita de forma simultânea com a
     * impressão do DANFE; usar o tpImp=5 quando esta for a única
     * forma de disponibilização do DANFE).
     * @var string
     * @max 1
     */
    public $tpImp = '1';

    /**
     * 1=Emissão normal (não em contingência);
     * 2=Contingência FS-IA, com impressão do DANFE em formulário
     * de segurança;
     * 3=Contingência SCAN (Sistema de Contingência do Ambiente
     * Nacional);
     * 4=Contingência DPEC (Declaração Prévia da Emissão em
     * Contingência);
     * 5=Contingência FS-DA, com impressão do DANFE em
     * formulário de segurança;
     * 6=Contingência SVC-AN (SEFAZ Virtual de Contingência do
     * AN);
     * 7=Contingência SVC-RS (SEFAZ Virtual de Contingência do
     * RS);
     * 9=Contingência off-line da NFC-e (as demais opções de
     * contingência são válidas também para a NFC-e).
     * Para a NFC-e somente estão disponíveis e são válidas as
     * opções de contingência 5 e 9.
     * @var string
     */
    public $tpEmis = '1';

    /**
     * Informar o DV da Chave de Acesso da NF-e, o DV será
     * calculado com a aplicação do algoritmo módulo 11 (base 2,9) da
     * Chave de Acesso. (vide item 5 do Manual de Orientação).
     * @var string
     * @max 1
     */
    public $cDV = '';

    /**
     * 1=Produção/2=Homologação.
     * @var string
     * @max 1
     */
    public $tpAmb = '';

    /**
     * 1=NF-e normal;
     * 2=NF-e complementar;
     * 3=NF-e de ajuste;
     * 4=Devolução de mercadoria.
     * @var string
     * @max 1
     */
    public $finNFe = '1';

    /**
     * 0=Normal;
     * 1=Consumidor final.
     * @var string
     * @max 1
     */
    public $indFinal = '0';

    /**
     * 0=Não se aplica (por exemplo, Nota Fiscal complementar ou de
     * ajuste);
     * 1=Operação presencial;
     * 2=Operação não presencial, pela Internet;
     * 3=Operação não presencial, Teleatendimento;
     * 4=NFC-e em operação com entrega a domicílio;
     * 9=Operação não presencial, outros.
     * @var string
     * @max 1
     */
    public $indPres = '';

    /**
     * 0=Emissão de NF-e com aplicativo do contribuinte;
     * 1=Emissão de NF-e avulsa pelo Fisco;
     * 2=Emissão de NF-e avulsa, pelo contribuinte com seu
     * certificado digital, através do site do Fisco;
     * 3=Emissão NF-e pelo contribuinte com aplicativo fornecido pelo
     * Fisco.
     * @var string
     * @max 1
     */
    public $procEmi = '0';

    /**
     * Informar a versão do aplicativo emissor de NF-e.
     * @var string
     * @max 20
     */
    public $verProc = BaseNFe::version;

    /**
     * Data e hora no formato UTC (Universal Coordinated Time):
     * AAAA-MM-DDThh:mm:ssTZD.
     * @var \DateTime
     */
    public $dhCont;

    /**
     * Justificativa da entrada em contingência.
     * (v2.0).
     * @var
     * @max 256
     */
    public $xJust;

    /**
     * Informação de Documentos Fiscais
     * referenciados.
     * Grupo com informações de Documentos Fiscais referenciados.
     * Informação utilizada nas hipóteses previstas na legislação. (Ex.:
     * Devolução de mercadorias, Substituição de NF cancelada,
     * Complementação de NF, etc.).
     * @var NFref
     */
    public $NFref;

    /**
     * IdeNfe constructor.
     */
    public function __construct()
    {
        $this->NFref = new PropriedadeNull('\PhpNFe\NFe\Builder\IdeNfe\NFref');
    }
}