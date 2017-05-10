<table class="table dados">
    <tr>
        <td>
            <b>Ambiente: </b><?php echo $evento->get('tpAmb') == '1' ? 'Produção' : 'Homologação'; ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>CNPJ emissor:</b> <?php echo $evento->get('CNPJ'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>CNPJ receptor:</b> <?php echo $retEvento->get('CNPJDest'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Data da C.C.:</b> <?php echo $retEvento->get('dhRegEvento'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Protocolo:</b> <?php echo $retEvento->get('nProt'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Sequência:</b> <?php echo $evento->get('nSeqEvento'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Texto:</b> <?php echo $evento->get('xCorrecao'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Condição de Uso:</b> <?php echo $evento->get('xCondUso'); ?>
        </td>
    </tr>
</table>