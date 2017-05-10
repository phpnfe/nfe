<?php

$env = trim(@$_ENV['APP_ENV']);

// Registrar a DOMPDF_DIR
if (defined('DOMPDF_DIR') != true) {
    if ($env == 'local') {
        define('DOMPDF_DIR', __DIR__ . '/../../vendor/dompdf/dompdf');
    } else {
        define('DOMPDF_DIR', __DIR__ . '/../../../../dompdf/dompdf');
    }
}