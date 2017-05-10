<h5>DADOS ADICIONAIS</h5>
<table class="table dados">
    <tr>
        <td class="col-8">
            <p>
                <small>INFORMAÇÕES COMPLEMENTARES</small>
                <?php
                $info = $nfe->get('infAdic.infCpl');
                $linhas = str_replace("\r", '', $info);
                $linhas = explode("\n", $linhas);
                while (count($linhas) < 6) {
                    $linhas[] = '';
                }

                echo implode('<br>', $linhas);
                ?>
            </p>
        </td>
        <td class="col-4">
            <p>
                <small>RESERVADO AO FISCO</small>
                <?php echo $nfe->get('infAdic.infAdFisco'); ?>
            </p>
        </td>
    </tr>
</table>