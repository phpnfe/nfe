<?php namespace PhpNFe\NFe\Tools;

class Modulo11
{
    public static function nfeCalculaDV($chave43)
    {
        $multiplicadores = [2, 3, 4, 5, 6, 7, 8, 9];

        $i = 42;
        $soma_ponderada = 0;
        while ($i >= 0) {
            for ($m = 0; $m < count($multiplicadores) && $i >= 0; $m++) {
                $soma_ponderada += $chave43[$i] * $multiplicadores[$m];
                $i--;
            }
        }

        $resto = $soma_ponderada % 11;
        if (($resto == '0') || ($resto == '1')) {
            $cDV = 0;
        } else {
            $cDV = 11 - $resto;
        }

        return $cDV;
    }
}