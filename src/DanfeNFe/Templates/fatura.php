<?php

// Gerar linhas
$count = $nfe->getDups();
$linhas = [];
$linha = [];

for ($i = 0; $i <= ($nfe->getDups() - 1); $i++) {
    if (count($linha) == 4) {
        $linhas[] = $linha;
        $linha = [];
    }
    $linha[] = $nfe->getDup($i);
}

if (count($linha) > 0) {
    $linhas[] = $linha;
}

if ((count($linhas) == 1) && (count($linhas[0]) < 4)) {
    while (count($linhas[0]) < 4) {
        $linhas[0][] = null;
    }
}

?>

<?php if (! empty($linhas)) {
    ?>
<h5>FATURA/DUPLICATA</h5>
<?php

} ?>
<table class="table">
    <?php foreach ($linhas as $linha) {
    ?>
    <tr>
        <?php foreach ($linha as $dup) {
        ?>
        <?php if (is_null($dup)) {
            ?>
        <td class="col-3 no-border no-pad"></td>
        <?php

        } else {
            ?>
        <td class="col-3 no-pad">
            <table class="table fatura">
                <tr>
                    <td class="no-border">
                        <p class="al-center">
                            <small>NÚMERO</small>
                            <?php echo $dup->get('nDup'); ?>
                        </p>
                    </td>
                    <td class="no-border">
                        <p class="al-center">
                            <small>VENCIMENTO</small>
                            <?php echo $dup->get('dVenc')->datetime('d/m/Y', 'Y-m-d'); ?>
                        </p>
                    </td>
                    <td class="al-right no-border">
                        <p>
                            <small>VALOR</small>
                            <?php echo $dup->get('vDup')->number(2); ?>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        <?php

        } ?>
        <?php

    } ?>
    </tr>
    <?php

} ?>
</table>