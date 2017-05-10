<table class="table origem">
    <tr>
        <td class="col-6">
            <p>
                <small>NATUREZA DA OPERACAO</small>
                <?php echo $nfe->get('ide.natOp'); ?>
            </p>
        </td>
        <td class="col-6">
            <small> PROTOCOLO DE AUTORIZAÇÃO DE USO</small>
            <h1><?php echo $prot->get('nProt'); ?><?php echo $prot->get('dhRecbto')->datetime('d/m/Y H:i:s'); ?></h1>
        </td>
    </tr>
</table>

<table class="table origem">
    <tr>
        <td class="col-4">
            <p>
                <small>INSCRIÇÃO ESTADUAL</small>
                <?php echo $nfe->get('emit.IE'); ?>
            </p>
        </td>
        <td class="col-4">
            <p>
                <small>INSC. ESTADUAL DO SUBST. TRIBUTÁRIO</small>
            </p>
        </td>
        <td class="col-4">
            <p>
                <small>CNPJ</small>
                <?php echo $nfe->get('emit.CNPJ')->format('##.###.###/####-##'); ?>
            </p>
        </td>
    </tr>
</table>