<?php
use PhpNFe\NFe\NFe;
use NFePHP\Common\Certificate;

class NFCeTest extends TestCase
{
    public function testOla()
    {
        $cert  = Certificate::readPfx('', '');

        $nfce = new NFe([], $cert);
        $this->assertTrue(true);
    }
}