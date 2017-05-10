<table class="table cabecalho">
    <tr>
        <td id="logo" rowspan="3" class="col-5 al-center val-center">
            <?php
            if (is_null($logo)) {
                include __DIR__ . '/logo.php';
            } else {
                echo '<img src="' . $logo . '" width="265px">';
            }
            ?>
        </td>
        <td class="al-center no-border col-2">
            <h6 class="txt-bold">DANFE</h6>
            Documento auxiliar<br>
            Nota Fiscal<br>
            Eletrônica<br>
        </td>
        <td class="col-6 al-center val-center">
            <img src="<?php echo $barcode; ?>" id="barcode">
        </td>
    </tr>
    <tr>
        <td class="col-2 no-border al-left">
            <div class="tpnf row">
                <div class="info">
                    0 - ENTRADA<br>
                    1 - SAÍDA
                </div>
                <div class="info-val">
                    <div class="box"><?php echo $nfe->get('ide.tpNF'); ?></div>
                </div>
            </div>
        </td>
        <td class="col-6">
            <small>CHAVE DE ACESSO</small>
            <h1><?php echo $nfe->getChNFe()->format('#### #### #### #### #### #### #### #### #### #### ####'); ?></h1>
        </td>
    </tr>
    <tr>
        <td class="col-2 al-center no-border txt-bold">
            <h6>
                Nº. <?php echo $nfe->get('ide.nNF')->pad(9)->format('###.###.###'); ?><br>
                FL 01/01<br>
                SÉRIE <?php echo $nfe->get('ide.serie')->pad(3); ?>
            </h6>
        </td>
        <td class="col-5 txt-bold al-center val-center">
            <h6>
                Consulta de autenticidade no portal nacional da NF-e<br>
                www.nfe.fazenda.gov.br ou no site da Sefaz Autorizadora
            </h6>
        </td>
    </tr>
</table>