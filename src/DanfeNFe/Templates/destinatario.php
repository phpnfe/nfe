<h5>DESTINATÁRIO/REMETENTE</h5>
<table class="table destinatario">
    <tr>
        <td class="col-8">
            <p>
                <small>NOME/RAZÃO SOCIAL</small>
                <?php echo $nfe->get('dest.xNome'); ?>
            </p>
        </td>
        <td class="col-2">
            <p>
                <small>CNPJ/CPF</small>
                <?php echo $nfe->get('dest.CNPJ') == ''
                    ? $nfe->get('dest.CPF')->format('###.###.###-##')
                    : $nfe->get('dest.CNPJ')->format('##.###.###/####-##'); ?>
            </p>
        </td>
        <td class="col-1">
            <p class="al-center">
                <small>DATA DE EMISSÃO</small>
                <?php echo $nfe->get('ide.dhEmi')->datetime('d/m/Y'); ?>
            </p>
        </td>
    </tr>
</table>
<table class="table destinatario">
    <tr>
        <td class="col-7">
            <p>
                <small>ENDERECO</small>
                <?php
                echo $nfe->get('dest.enderDest.xLgr') . ' Nº ' . $nfe->get('dest.enderDest.nro') . ($nfe->get('dest.enderDest.xCpl')
                    != '' ? (' - ' . $nfe->get('dest.enderDest.xCpl')) : ''); ?>

            </p>
        </td>
        <td class="col-4">
            <p>
                <small>BAIRRO/DISTRITO</small>
                <?php echo $nfe->get('dest.enderDest.xBairro'); ?>
            </p>
        </td>
        <td class="col-1">
            <p class="al-center">
                <small>DATA DE SAÍDA</small>
                <?php echo $nfe->get('ide.dhSaiEnt')->datetime('d/m/Y'); ?>
            </p>
        </td>
    </tr>
</table>
<table class="table destinatario">
    <tr>
        <td>
            <p>
                <small>MUNICÍPIO</small>
                <?php echo $nfe->get('dest.enderDest.xMun'); ?>
            </p>
        </td>
        <td class="col-1">
            <p>
                <small>UF</small>
                <?php echo $nfe->get('dest.enderDest.UF'); ?>
            </p>
        </td>
        <td class="col-1">
            <p>
                <small>CEP</small>
                <?php echo $nfe->get('dest.enderDest.CEP')->format('#####-###'); ?>
            </p>
        </td>
        <td class="col-1">
            <p>
                <small>FONE/FAX</small>
                <?php echo $nfe->get('dest.enderDest.fone'); ?>
            </p>
        </td>
        <td class="col-2">
            <p>
                <small>INSCRIÇÃO ESTADUAL</small>
                <?php echo $nfe->get('dest.IE'); ?>
            </p>
        </td>
        <td class="col-1">
            <p class="al-center">
                <small>HORA DE SAÍDA</small>
                <?php echo $nfe->get('ide.dhSaiEnt')->datetime('H:i:s'); ?>
            </p>
        </td>
    </tr>
</table>