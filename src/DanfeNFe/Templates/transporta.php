<h5>TRANSPORTADOR/VOLUMES TRANSPORTADOS</h5>
<table class="table transporta">
    <tr>
        <td class="col-4">
            <p>
                <small>RAZÃO SOCIAL</small>
                <?php echo $nfe->get('transp.transporta.xNome'); ?>
            </p>
        </td>
        <td class="col-1">
            <p>
                <small>FRETE POR CONTA</small>
                <nobr><?php echo $nfe->get('transp.modFrete')->frete(); ?></nobr>
            </p>
        </td>
        <td class="col-2">
            <p>
                <small>CÓDIGO ANTT</small>
            </p>
        </td>
        <td class="col-2">
            <p>
                <small>PLACA DO VEÍC</small>
            </p>
        </td>
        <td class="col-1">
            <p>
                <small>UF</small>
                <?php echo $nfe->get('transp.transporta.UF'); ?>
            </p>
        </td>
        <td class="col-2">
            <p>
                <small>CPF/CNPJ</small>
                <?php echo $nfe->get('transp.transporta.CNPJ') == ''
                    ? $nfe->get('transp.transporta.CPF')->format('###.###.###-##')
                    : $nfe->get('transp.transporta.CNPJ')->format('##.###.###/####-##'); ?>
            </p>
        </td>
    </tr>
</table>

<table class="table transporta">
    <tr>
        <td class="col-5">
            <p>
                <small>ENDEREÇO</small>
                <?php echo $nfe->get('transp.transporta.xEnder'); ?>
            </p>
        </td>
        <td class="col-4">
            <p>
                <small>MUNICÍPIO</small>
                <?php echo $nfe->get('transp.transporta.xMun'); ?>
            </p>
        </td>
        <td class="col-1">
            <p>
                <small>UF</small>
                <?php echo $nfe->get('transp.transporta.UF'); ?>
            </p>
        </td>
        <td class="col-2">
            <p>
                <small>INSCRIÇÃO ESTADUAL</small>
                <?php echo $nfe->get('transp.transporta.IE'); ?>
            </p>
        </td>
    </tr>
</table>

<table class="table transporta">
    <tr>
        <td class="col-2">
            <p>
                <small>QUANTIDADE</small>
                <?php echo $nfe->get('transp.vol.qVol'); ?>
            </p>
        </td>
        <td class="col-2">
            <p>
                <small>ESPÉCIE</small>
                <?php echo $nfe->get('transp.vol.esp'); ?>
            </p>
        </td>
        <td class="col-2">
            <p>
                <small>MARCA</small>
                <?php echo $nfe->get('transp.vol.marca'); ?>
            </p>
        </td>
        <td class="col-2">
            <p>
                <small>NUMERAÇÃO</small>
                <?php echo $nfe->get('transp.vol.nVol'); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>PESO BRUTO</small>
                <?php echo $nfe->get('transp.vol.pesoB'); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>PESO LIQUIDO</small>
                <?php echo $nfe->get('transp.vol.pesoL'); ?>
            </p>
        </td>
    </tr>
</table>