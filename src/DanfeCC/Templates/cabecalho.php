<table class="table cabecalho">
    <tr>
        <td id="logo" rowspan="3" class="col-3 al-center val-center">
            <?php
            if (is_null($logo)) {
            } else {
                echo '<img src="' . $logo . '" width="265px">';
            }
            ?>
        </td>
        <td class="col-2 al-center no-border" rowspan="2">
            <h6 class="txt-bold">CARTA<br>
                CORREÇÃO ELETRÔNICA<br></h6>
        </td>
        <td class="col-7 al-center val-center">
            <img src="<?php echo $barcode; ?>" id="barcode">
        </td>
    </tr>
    <tr>
        <td class="col-5">
            <h6 class="al-center">CHAVE DE ACESSO</h6>
            <h1><?php echo $info->montarChNFe(false); ?></h1>
        </td>
    </tr>
    <tr>
        <td class="col-2 al-center no-border txt-bold">
            <h6>
                Nº. <?php echo $info->nNF; ?><br>
                FL 01/01<br>
                SÉRIE <?php echo $info->serie; ?>
            </h6>
        </td>
        <td class="col-7 txt-bold al-center val-center">
            <h6>
                Consulta de autenticidade no portal nacional da NF-e<br>
                www.nfe.fazenda.gov.br ou no site da Sefaz Autorizadora
            </h6>
        </td>
    </tr>
</table>