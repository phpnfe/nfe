<table class="table canhoto">
    <tr>
        <td colspan="2" class="al-center">
            RECEBEMOS DE <?php echo $nfe->get('emit.xNome'); ?> OS PRODUTOS CONSTANTES DA NOTA FISCAL INDICADA AO LADO
        </td>
        <td rowspan="2" class="al-center val-center txt-bold" style="width: 100px;">
            NF-e<br>
            No.: <?php echo $nfe->get('ide.nNF')->pad(9)->format('###.###.###'); ?><br>
            SÉRIE: <?php echo $nfe->get('ide.serie')->pad(3); ?>
        </td>
    </tr>
    <tr>
        <td style="width: 150px;">
            <p>
                <small>DATA DE RECEBIMENTO</small>
            </p>
        </td>   
        <td>
            <p>
                <small>IDENTIFICAÇÃO E ASSINATURA DO RECEBEDOR</small>
            </p>
        </td>
    </tr>
</table>