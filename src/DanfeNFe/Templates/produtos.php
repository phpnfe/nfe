<h5>DADOS DO PRODUTO/SERVIÇOS</h5>
<?php
$detutos = $nfe->get('')->toArray('det'); ?>
<div class="produtos">
    <div>
        <table border="cols" rules="cols" class="table">
            <thead>
            <tr>
                <th class="col-1" rowspan="2">CÓD PROD.</th>
                <th class="col-3" rowspan="2">DESCRIÇÃO DOS PRODUTOS/SERVIÇOS</th>
                <th class="col-min" rowspan="2">NCM/SH</th>
                <th class="col-min" rowspan="2">CST</th>
                <th class="col-min" rowspan="2">CFOP</th>
                <th class="col-min" rowspan="2">UNIDADE</th>
                <th class="col" rowspan="2">QUANT.</th>
                <th class="col" rowspan="2">V.UNIT.</th>
                <th class="col-1" rowspan="2">V.TOTAL</th>
                <th class="col-min" rowspan="2">BC ICMS</th>
                <th class="col-min" rowspan="2">VALOR ICMS</th>
                <th class="col-min" rowspan="2">VALOR IPI</th>
                <th colspan="2">ALIQUOTAS</th>
                <th class="col-min nobrr" rowspan="2">V.APROX. TRIBUTOS</th>
            </tr>
            <tr>
                <th class="col-min">ICMS</th>
                <th class="col-min">IPI</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($detutos as $det) {
    ?>
                <tr>
                    <td class="col-1 al-right"><?php echo $det->get('prod.cProd'); ?></td>
                    <td class="col-3"><?php echo $det->get('prod.xProd'); ?></td>
                    <td class="col-min al-center"><?php echo $det->get('prod.NCM'); ?></td>
                    <td class="col-min al-center"><?php echo $det->get('imposto.ICMS')->first()->get('CST|CSOSN'); ?></td>
                    <td class="col-min al-center"><?php echo $det->get('prod.CFOP'); ?></td>
                    <td class="col-min al-center"><?php echo $det->get('prod.uCom'); ?></td>
                    <td class="col al-right"><?php echo $det->get('prod.qCom')->number(0, false); ?></td>
                    <td class="col al-right"><?php echo $det->get('prod.vUnCom')->number(2, false); ?></td>
                    <td class="col-min al-right"><?php echo $det->get('prod.vProd')->number(2); ?></td>
                    <td class="col-min al-right"><?php echo $det->get('imposto.ICMS')->first()->get('vBC')->number(2); ?></td>
                    <td class="col-min al-right"><?php echo $det->get('imposto.ICMS')->first()->get('vICMS')->number(2); ?></td>
                    <td class="col-min al-right"><?php echo $det->get('imposto.IPI.IPITrib.vIPI')->number(2); ?></td>
                    <td class="col-min al-right"><?php echo $det->get('imposto.ICMS')->first()->get('pICMS')->number(2); ?></td>
                    <td class="col-min al-right"><?php echo $det->get('imposto.IPI.IPITrib.pIPI')->number(2); ?></td>
                    <td class="col-min al-right"><?php echo $det->get('imposto.vTotTrib')->number(2); ?></td>
                </tr>
            <?php

}
            ?>
            </tbody>
        </table>
    </div>
</div>