<!DOCTYPE html>
<html>
    <?php include __DIR__ . '/head.php'; ?>
<body class="ambiente-<?php echo $nfe->get('ide.tpAmb'); ?>">
    <?php include __DIR__ . '/canhoto.php'; ?>
    <?php include __DIR__ . '/cabecalho.php'; ?>
    <?php include __DIR__ . '/origem.php'; ?>
    <?php include __DIR__ . '/destinatario.php'; ?>
    <?php include __DIR__ . '/fatura.php'; ?>
    <?php include __DIR__ . '/imposto.php'; ?>
    <?php include __DIR__ . '/transporta.php'; ?>
    <?php include __DIR__ . '/produtos.php'; ?>
    <?php include __DIR__ . '/dados.php'; ?>
</body>
</html>