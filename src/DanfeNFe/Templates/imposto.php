<h5>CÁLCULO DO IMPOSTO</h5>
<table class="table imposto">
    <tr>
        <td class="col-2">
            <p class="al-right">
                <small>BASE DE CÁLCULO ICMS</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vBC')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>VALOR ICMS</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vICMS')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>BASE DE CÁLCULO ICMS ST</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vBCST')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>VALOR ICMS ST</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vST')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>VALOR TOTAL PRODUTOS</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vProd')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>VALOR APROXIMADO TRIBUTOS</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vTotTrib')->number(2, false); ?>
            </p>
        </td>
    </tr>
    <tr>
        <td class="col-2">
            <p class="al-right">
                <small>VALOR DO FRETE</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vFrete')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>VALOR DO SEGURO</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vSeg')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>DESCONTO</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vDesc')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>OUTRAS DESPESAS ACESSÓRIAS</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vOutro')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>VALOR IPI</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vIPI')->number(2, false); ?>
            </p>
        </td>
        <td class="col-2">
            <p class="al-right">
                <small>VALOR TOTAL DA NOTA</small>
                R$ <?php echo $nfe->get('total.ICMSTot.vNF')->number(2, false); ?>
            </p>
        </td>
    </tr>
</table>