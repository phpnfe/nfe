<div>
    <div class="destaque"><?php echo $nfe->get('emit.xNome'); ?></div>
    <span><?php echo $nfe->get('emit.xLgr'); ?></span>,
    <span><?php echo $nfe->get('emit.nro'); ?></span><br>
    <span><?php echo $nfe->get('emit.xBairro'); ?></span> -
    <span><?php echo $nfe->get('emit.CEP')->format('#####-###'); ?></span><br>
    <span><?php echo $nfe->get('emit.xMun'); ?></span> - <span><?php echo $nfe->get('emit.UF'); ?></span><br>
    <?php
    if ($nfe->get('emit.fone') != '') {
        echo '<span>Fone/Fax:</span><br>';
        echo '<div class="destaque">' . $nfe->get('emit.fone') . '</div>';
    }
    ?>
</div>
